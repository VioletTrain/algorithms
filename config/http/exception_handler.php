<?php

use Algorithms\Http\HttpExceptionHandler;
use Anso\Framework\Base\FileLogger;

return new HttpExceptionHandler(new FileLogger());