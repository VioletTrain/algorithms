<?php

namespace Anso\Framework\Http\Action;

use Algorithms\Boundary\IntBoundary;
use Algorithms\IntToRomanConverter;
use Anso\Framework\Http\BaseResponse;
use Anso\Framework\Http\Contract\Request;
use Anso\Framework\Http\Contract\Response;
use Anso\Framework\Http\Contract\Routing\Action;

class IntToRomanAction implements Action
{
    private IntToRomanConverter $converter;

    public function __construct(IntToRomanConverter $converter)
    {
        $this->converter = $converter;
    }

    public function execute(Request $request): Response
    {
        $int = $request->get('int') ?? 0;

        $roman = $this->converter->convert(new IntBoundary($int));

        return new BaseResponse(['roman' => $roman]);
    }
}