<?php

namespace Algorithms\Http\Action;

use Algorithms\Boundary\IntBoundary;
use Algorithms\Entity\Result;
use Algorithms\Entity\ResultManager;
use Algorithms\IntToRomanConverter;
use Anso\Framework\Http\Response;
use Anso\Framework\Http\Request;
use Anso\Framework\Http\Contract\Routing\Action;

class IntToRomanAction implements Action
{
    private IntToRomanConverter $converter;

    private ResultManager $rm;

    public function __construct(IntToRomanConverter $converter, ResultManager $rm)
    {
        $this->converter = $converter;
        $this->rm = $rm;
    }

    public function execute(Request $request): Response
    {
        $int = $request->get('int');

        $roman = $this->converter->convert(new IntBoundary($int));

        $this->rm->saveResult(new Result('int-to-roman', $int, $roman));

        return new Response(['roman' => $roman]);
    }
}