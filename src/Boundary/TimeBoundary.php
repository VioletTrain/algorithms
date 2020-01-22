<?php

namespace Algorithms\Boundary;

use Algorithms\Exception\InvalidTimeFormatException;
use Algorithms\Time;

class TimeBoundary
{
    /**
     * @param string $time
     * @return Time
     * @throws InvalidTimeFormatException
     */
    public function convert(string $time): Time
    {
        $time = new Time($time);

        if (!$this->validate($time)) {
            throw new InvalidTimeFormatException('Invalid time format.');
        }

        return $time;
    }

    private function validate(Time $time): bool
    {
        return $this->validateHours($time)
            && $this->validateMinutes($time)
            && $this->validateSeconds($time)
            && $this->validateDayPeriod($time);
    }

    private function validateHours(Time $time): bool
    {
        $hours = $this->getInteger($time->hours());

        if (!$hours) {
            return false;
        }

        if ($time->dayPeriod() !== '') {
            return 1 <= $hours && $hours < 13 ? true : false;
        }

        return 0 <= $hours && $hours < 24 ? true : false;
    }

    private function validateMinutes(Time $time): bool
    {
        $minutes = $this->getInteger($time->minutes());

        if (!$minutes) {
            return false;
        }

        return 0 <= $time->minutes() && $time->minutes() < 60 ? true : false;
    }

    private function validateSeconds(Time $time): bool
    {
        if ($time->seconds() === '') {
            return true;
        }

        $seconds = $this->getInteger($time->seconds());

        if (!$seconds) {
            return false;
        }

        return 0 <= $seconds && $seconds < 60 ? true : false;
    }

    private function validateDayPeriod(Time $time): bool
    {
        $dayPeriod = mb_strtoupper($time->dayPeriod());

        if ($dayPeriod === '') {
            return true;
        }

        return $dayPeriod === 'PM' || $dayPeriod === 'AM' ? true : false;
    }

    private function getInteger(string $numeric)
    {
        if (!is_numeric($numeric)) {
            return '';
        }

        return intval($numeric);
    }
}