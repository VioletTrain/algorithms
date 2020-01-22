<?php

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

    public function test_Converter_ConvertsIntegerToRoman_WhenLessThan10IsGiven()
    {
        $int = 9;

        $roman = $this->converter->convert($int);

        $this->assertEquals('IX', $roman);
    }

    public function test_Converter_ConvertsIntegerToRoman_WhenMoreThan10IsGiven()
    {
        $int = 49;

        $roman = $this->converter->convert($int);

        $this->assertEquals('XLIX', $roman);
    }

    public function test_Converter_ConvertsIntegerToRoman_WhenMoreThanHundredIsGiven()
    {
        $int = 246;

        $roman = $this->converter->convert($int);

        $this->assertEquals('CCXLVI', $roman);
    }

    public function test_Converter_ConvertsIntegerToRoman_WhenThousandIsGiven()
    {
        $int = 9999;

        $roman = $this->converter->convert($int);

        $this->assertEquals('MMMMMMMMMCMXCIX', $roman);
    }
}