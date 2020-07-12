<?php

namespace App\Services;

use App\Verify\IService;
use Twilio\Rest\Client;
use Twilio\Exceptions\TwilioException;

class TwilioService implements IService {

    private $client;
    private $verification_sid;

    public function __construct() {
        $account_sid = config('twilio.sid');
        $auth_token = config('twilio.auth_token');
        $this->verification_sid = config('twilio.verification_sid');

        $this->client = new Client($account_sid, $auth_token);
    }

    /**
     * Verify the user by sending email
     *
     * @param array $recipient_info
     * @return array
     */
    public function verify($recipient_info) : array {

        if($recipient_info['phone']) {
            
            try {
                $verification = $this->client->verify->v2->services($this->verification_sid)
                    ->verifications
                    ->create($recipient_info['phone'], 'sms');

                if($verification->sid) {
                    return array('message' => 'Check your phone for verification message');
                } else {
                    return array('error' => 'Something went wrong in verification');
                }

            } catch (TwilioException $exception) {
                return array('error' => 'Verification failed. Make sure that your phone number is correct and in global format');
            }

        } else {

            return array('error' => 'You didn\'t provide a phone number');
        }
    }
}