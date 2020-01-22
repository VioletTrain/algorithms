<?php

namespace Algorithms;

class IntToRomanConverter
{
    private array $romanSymbols = [
        0 => [
            'first' => 'I',
            'middle' => 'V',
            'last' => 'X'
        ],
        1 => [
            'first' => 'X',
            'middle' => 'L',
            'last' => 'C'
        ],
        2 => [
            'first' => 'C',
            'middle' => 'D',
            'last' => 'M'
        ],
        3 => [
            'first' => 'M',
            'middle' => 'M',
            'last' => 'M'
        ],
    ];

    public function convert(int $integer)
    {
        $roman = '';

        if ($integer > 0 && $integer < 10) {
            return $this->convertDigit($integer, $this->romanSymbols[0]);
        }

        $i = 0;

        while (($integer / 10) >= 0.1) {
            $number = $integer % 10;

            if ($i < 3) {
                $roman = $this->convertDigit($number, $this->romanSymbols[$i]) . $roman;
            } else {
                $roman = str_repeat('M', $number) . $roman;
            }

            $integer = (int) floor($integer / 10);

            if ($i < 3) {
                $i++;
            }
        }

        return $roman;
    }

    private function convertDigit(int $digit, array $symbols): string
    {
        $romanDigit = '';

        if ($digit > 0 && $digit < 4) {
            $romanDigit .= str_repeat($symbols['first'], $digit);
        } elseif ($digit >= 4 && $digit < 9) {
            $romanDigit .= $symbols['middle'];

            if ($digit === 4) {
                $romanDigit = $symbols['first'] . $romanDigit;
            } elseif ($digit > 5) {
                $romanDigit = $romanDigit . str_repeat($symbols['first'], $digit - 5);
            }
        } elseif ($digit === 9) {
            $romanDigit .= $symbols['first'] . $symbols['last'];
        }

        return $romanDigit;
    }
}