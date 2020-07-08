<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Verify\IService;

class VerifyController extends Controller
{

    private $verificationService;

    public function __construct(IService $verificationService) {
        $this->verificationService = $verificationService;
    }

    /**
     * Verify the user depending on the injected service
     *
     * @param Request $request
     * @return Response
     */
    public function verify(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|regex:/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/',
            'phone' => 'required'
        ]);

        if($validatedData) {

            $response = $this->verificationService->verify($validatedData);

            return response()->json($response);
        }

        // return response()->json(array('message' => 'You should choose between SMS or EMAIL'));
    }
}
