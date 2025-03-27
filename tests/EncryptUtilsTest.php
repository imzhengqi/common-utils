<?php

use PHPUnit\Framework\TestCase;
use zhengqi\common\utils\EncryptUtils;

class EncryptUtilsTest extends TestCase
{
    public function testPasswordHash()
    {
        $string = 'test_password';
        $hash = EncryptUtils::passwordHash($string);
        $this->assertIsString($hash);
    }

    public function testPasswordVerify()
    {
        $string = 'test_password';
        $hash = EncryptUtils::passwordHash($string);
        $this->assertTrue(EncryptUtils::passwordVerify($string, $hash));
        $this->assertFalse(EncryptUtils::passwordVerify('wrong_password', $hash));
    }

    public function testHmac()
    {
        $string = 'test_string';
        $key = 'your-secret-key';
        $hmac = EncryptUtils::hmac($string, $key);
        $this->assertIsString($hmac);
    }

    public function testMd5()
    {
        $string = 'test_string';
        $md5 = EncryptUtils::md5($string);
        $this->assertIsString($md5);
    }

    public function testSha1()
    {
        $string = 'test_string';
        $sha1 = EncryptUtils::sha1($string);
        $this->assertIsString($sha1);
    }
}