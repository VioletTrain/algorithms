<?php

namespace Anso\Framework\Http\Contract\Exception;

interface HttpException
{
    public function getMessage();
    public function getCode();
}