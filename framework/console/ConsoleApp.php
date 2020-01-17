<?php

namespace Anso\Framework\Console;

use Anso\Framework\Base\BaseApp;
use Anso\Framework\Base\BindingException;
use Anso\Framework\Console\Exception\ConsoleExceptionHandler;
use Exception;
use ReflectionException;

class ConsoleApp extends BaseApp
{
    public function start(): void
    {
        $exceptionHandler = new ConsoleExceptionHandler();

        try {
            $this->startMainLoop();
        } catch (Exception $e) {
//            $exceptionHandler->handle();
            echo $e->getMessage();
        }
    }

    /**
     * @throws BindingException
     * @throws ReflectionException
     */
    protected function startMainLoop()
    {
        $ioManager = $this->container->make(IOManager::class);
        $parser = $this->container->make(CommandParser::class);

        var_dump($parser);die;

//        while (true) {
//            $ioManager->readInput();
//
//        }
    }
}