<?php

namespace Anso\Framework\Base;

use Exception;
use Throwable;

class BindingException extends Exception
{
    protected $code = 500;
}