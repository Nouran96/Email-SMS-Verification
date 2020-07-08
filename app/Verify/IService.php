<?php

namespace App\Verify;


interface IService {

    /**
     * Verify the user
     *
     * @param array $recipient_info
     * @return array
     */
    public function verify($recipient_info) : array;
}