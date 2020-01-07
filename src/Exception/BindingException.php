<?php

namespace Anso\Exception;

use Exception;
use Throwable;

class BindingException extends Exception
{
    protected $code = 500;
}