<?php

use PHPUnit\Framework\TestCase;
use zhengqi\common\utils\IpUtils;

class IpUtilsTest extends TestCase
{
    public function testIsValidIp()
    {
        $this->assertTrue(IpUtils::isValidIp('127.0.0.1'));
        $this->assertFalse(IpUtils::isValidIp('invalid_ip'));
    }

    public function testGetClientIp()
    {
        $ip = IpUtils::getClientIp();
        $this->assertIsString($ip);
    }
}