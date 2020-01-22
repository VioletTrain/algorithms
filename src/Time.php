<?php

namespace Algorithms;

class Time
{
    private string $time;

    /**
     * @var string AM|PM
     */
    private string $dayPeriod = '';
    private string $hours = '00';
    private string $minutes = '00';
    private string $seconds = '';

    public function __construct(string $time = '')
    {
        $this->time = $time;
        $this->dayPeriod = $this->getDayPeriod($time);

        $time = chop($time, $this->dayPeriod);
        $this->divideIntoHMS($time);
    }

    private function getDayPeriod(string $time): string
    {
        $dayPeriod = substr($time, -2, 2);

        if (mb_strtoupper($dayPeriod) === 'PM' || mb_strtoupper($dayPeriod) === 'AM') {
            return $dayPeriod;
        }

        return '';
    }

    /**
     * Divide time string into hours, minutes, seconds
     * @param string $time
     */
    private function divideIntoHMS(string $time): void
    {
        $explodedTime = explode(':', $time);

        if (count($explodedTime) >= 2) {
            $this->hours = $explodedTime[0];
            $this->minutes = $explodedTime[1];
        }

        if (count($explodedTime) === 3) {
            $this->seconds = $explodedTime[2];
        }
    }

    public function military(): string
    {
        if (!$this->dayPeriod()) {
            return $this;
        }

        if ($this->dayPeriod() === 'PM') {
            $convertedHours = $this->hours() === '12' ? $this->hours : intval($this->hours) + 12;
        } else {
            $convertedHours = $this->hours() === '12' ? '00' : $this->hours();
        }

        $time = [$convertedHours, $this->minutes()];

        if ($this->seconds()) {
            $time[] = $this->seconds();
        }

        return implode(':', $time);
    }

    public function hours(): string
    {
        return $this->hours;
    }

    public function minutes(): string
    {
        return $this->minutes;
    }

    public function seconds(): string
    {
        return $this->seconds;
    }

    public function dayPeriod():string
    {
        return mb_strtoupper($this->dayPeriod);
    }

    public function __toString()
    {
        $time = [$this->hours(), $this->minutes()];

        if ($this->seconds()) {
            $time[] = $this->seconds();
        }

        return implode(':', $time);
    }
}