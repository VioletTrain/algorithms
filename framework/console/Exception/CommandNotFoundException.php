<?php

namespace Anso\Framework\Console\Exception;

use Anso\Framework\Console\Contract\Exception\ConsoleException;
use Exception;
use Throwable;

class CommandNotFoundException extends Exception implements ConsoleException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $message = "'" . $message . "' command was not found";
        parent::__construct($message, $code, $previous);
    }
}