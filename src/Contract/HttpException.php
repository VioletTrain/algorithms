<?php

namespace Anso\Contract;

interface HttpException
{
    public function getMessage();
    public function getCode();
}