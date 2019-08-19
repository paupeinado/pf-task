<?php

namespace App\Interfaces;

interface LoggerInterface
{
    /**
     * Should add the message in the log
     */
    public function error(string $message);
}
