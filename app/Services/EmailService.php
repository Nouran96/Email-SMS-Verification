<?php

namespace App\Services;

use App\Verify\IService;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationMail;

class EmailService implements IService {

    /**
     * Verify the user by sending email
     *
     * @param array $recipient_info
     * @return array
     */
    public function verify($recipient_info) : array {

        if($recipient_info['email']) {
            
            Mail::to($recipient_info['email'])->send(new VerificationMail($recipient_info));
            return array('message' => 'Check your email for verification mail');

        } else {

            return array('error' => 'You didn\'t provide an email address');
        }
    }
}