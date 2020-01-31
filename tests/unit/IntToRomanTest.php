<?php

use Algorithms\Boundary\IntBoundary;
use Algorithms\IntToRomanConverter;
use PHPUnit\Framework\TestCase;


class IntToRomanTest extends TestCase
{
    private IntToRomanConverter $converter;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->converter = new IntToRomanConverter();
    }

    /**
     * @throws \Algorithms\Exception\BoundaryException
     */
    public function test_Converter_ConvertsIntegerToRoman_WhenLessThan10IsGiven()
    {
        $int = 9;

        $roman = $this->converter->convert(new IntBoundary($int));

        $this->assertEquals('IX', $roman);
    }

    /**
     * @throws \Algorithms\Exception\BoundaryException
     */
    public function test_Converter_ConvertsIntegerToRoman_WhenMoreThan10IsGiven()
    {
        $int = 49;

        $roman = $this->converter->convert(new IntBoundary($int));

        $this->assertEquals('XLIX', $roman);
    }

    /**
     * @throws \Algorithms\Exception\BoundaryException
     */
    public function test_Converter_ConvertsIntegerToRoman_WhenMoreThanHundredIsGiven()
    {
        $int = 246;

        $roman = $this->converter->convert(new IntBoundary($int));

        $this->assertEquals('CCXLVI', $roman);
    }

    /**
     * @throws \Algorithms\Exception\BoundaryException
     */
    public function test_Converter_ConvertsIntegerToRoman_WhenThousandIsGiven()
    {
        $int = 9999;

        $roman = $this->converter->convert(new IntBoundary($int));

        $this->assertEquals('MMMMMMMMMCMXCIX', $roman);
    }
}