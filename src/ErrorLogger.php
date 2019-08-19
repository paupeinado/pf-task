<?php

namespace App;

use App\Interfaces\LoggerInterface;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class ErrorLogger implements LoggerInterface
{
    private $logger;

    /**
     * ErrorLogger constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->logger = new Logger(getenv('LOG_CHANNEL'));
        $this->logger->pushHandler(new StreamHandler(getenv('LOG_PATH'), Logger::WARNING));
    }

    public function error(string $message)
    {
        $this->logger->error($message);
    }
}
