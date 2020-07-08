<?php

namespace App\Verify;


interface IService {

    /**
     * Verify the user
     *
     * @param array $recipient_info
     */
    public function verify($recipient_info);
}