<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationMail;

class VerifyController extends Controller
{
    public function verify(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|regex:/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/',
            'phone' => 'required|numeric'
        ]);

        if($validatedData) {
            $data = array('phone' => $validatedData['phone'], 'email' => $validatedData['email']);

            Mail::to($validatedData['email'])->send(new VerificationMail($data));

            return response()->json(array('message' => 'Check you email for verification mail'));
        }
    }
}
