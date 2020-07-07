<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationMail;
use Twilio\Rest\Client;
use Twilio\Exceptions\TwilioException;

class VerifyController extends Controller
{


    public function verify(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|regex:/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/',
            'phone' => 'required'
        ]);

        if($validatedData) {
            if(config('verify.verification_method') == 'EMAIL') {

                $data = array('phone' => $validatedData['phone'], 'email' => $validatedData['email']);
    
                Mail::to($validatedData['email'])->send(new VerificationMail($data));
    
                return response()->json(array('message' => 'Check you email for verification mail'));

            } else if(config('verify.verification_method') == 'SMS') {
                $account_sid = config('twilio.sid');
                $auth_token = config('twilio.auth_token');
                $verification_sid = config('twilio.verification_sid');

                $client = new Client($account_sid, $auth_token);

                try {
                    $verification = $client->verify->v2->services($verification_sid)
                        ->verifications
                        ->create($validatedData['phone'], 'sms');
                } catch (TwilioException $exception) {
                    return response()->json(array('error' => 'Verification failed'));
                }

                return response()->json(array('message' => 'Check your phone for verification message'));
            }

            return response()->json(array('message' => 'You should choose between SMS or EMAIL'));
        }
    }
}
