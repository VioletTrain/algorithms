<?php

namespace Anso\Framework\Console\Contract\Exception;

interface ConsoleException
{
    public function getMessage();
    public function getCode();
}