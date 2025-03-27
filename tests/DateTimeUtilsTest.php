<?php

use PHPUnit\Framework\TestCase;
use zhengqi\common\utils\DateTimeUtils;

class DateTimeUtilsTest extends TestCase
{
    public function testGetDayStartAndEnd()
    {
        $datetime = '2025-03-27 12:00:00';
        $result = DateTimeUtils::getDayStartAndEnd($datetime);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('start', $result);
        $this->assertArrayHasKey('end', $result);
    }

    public function testGetWeekStart()
    {
        $datetime = '2025-03-27 12:00:00';
        $result = DateTimeUtils::getWeekStart($datetime);
        $this->assertIsString($result);
    }

    public function testGetWeekEnd()
    {
        $datetime = '2025-03-27 12:00:00';
        $result = DateTimeUtils::getWeekEnd($datetime);
        $this->assertIsString($result);
    }

    public function testGetWeekStartAndEnd()
    {
        $datetime = '2025-03-27 12:00:00';
        $result = DateTimeUtils::getWeekStartAndEnd($datetime);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('start', $result);
        $this->assertArrayHasKey('end', $result);
    }

    public function testGetMonthStart()
    {
        $datetime = '2025-03-27 12:00:00';
        $result = DateTimeUtils::getMonthStart($datetime);
        $this->assertIsString($result);
    }

    public function testGetMonthEnd()
    {
        $datetime = '2025-03-27 12:00:00';
        $result = DateTimeUtils::getMonthEnd($datetime);
        $this->assertIsString($result);
    }

    public function testGetMonthStartAndEnd()
    {
        $datetime = '2025-03-27 12:00:00';
        $result = DateTimeUtils::getMonthStartAndEnd($datetime);
        $this->assertIsArray($result);
        $this->assertArrayHasKey('start', $result);
        $this->assertArrayHasKey('end', $result);
    }

    public function testGetYearStart()
    {
        $datetime = '2025-03-27 12:00:00';
        $result = DateTimeUtils::getYearStart($datetime);
        $this->assertIsString($result);
    }

    public function testGetYearEnd()
    {
        $datetime = '2025-03-27 12:00:00';
        $result = DateTimeUtils::getYearEnd($datetime);
        $this->assertIsString($result);
    }
}