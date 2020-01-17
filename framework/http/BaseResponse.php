<?php

namespace Anso\Framework\Http;

use Anso\Framework\Http\Contract\Response;
use ArrayObject;
use JsonSerializable;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class BaseResponse extends SymfonyResponse implements Response
{
    public function __construct($content = '', int $status = 200, array $headers = [])
    {
        $shouldBeJson = $this->shouldBeJson($content);

        if ($shouldBeJson) {
            $content = $this->morphToJson($content);
        }

        parent::__construct($content, $status, $headers);

        if ($shouldBeJson) {
            $this->headers->set('Content-Type', 'application/json');
        }
    }

    protected function shouldBeJson($content): bool
    {
        return $content instanceof ArrayObject ||
               $content instanceof JsonSerializable ||
               is_array($content);
    }

    protected function morphToJson($content): string
    {
        return json_encode($content);
    }

    public function send(): void
    {
        parent::send();
    }
}