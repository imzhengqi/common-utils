<?php

use PHPUnit\Framework\TestCase;
use zhengqi\common\utils\StringUtils;

class StringUtilsTest extends TestCase
{
    public function testIsNull()
    {
        $this->assertTrue(StringUtils::isNull(null));
        $this->assertFalse(StringUtils::isNull('not null'));
    }

    public function testIsNotNull()
    {
        $this->assertFalse(StringUtils::isNotNull(null));
        $this->assertTrue(StringUtils::isNotNull('not null'));
    }

    public function testIsEmpty()
    {
        $this->assertTrue(StringUtils::isEmpty(''));
        $this->assertTrue(StringUtils::isEmpty(null));
        $this->assertFalse(StringUtils::isEmpty('not empty'));
    }

    public function testIsNotEmpty()
    {
        $this->assertFalse(StringUtils::isNotEmpty(''));
        $this->assertFalse(StringUtils::isNotEmpty(null));
        $this->assertTrue(StringUtils::isNotEmpty('not empty'));
    }

    public function testIsStartWith()
    {
        $this->assertTrue(StringUtils::isStartWith('hello world', 'hello'));
        $this->assertFalse(StringUtils::isStartWith('hello world', 'world'));
    }

    public function testIsEndWith()
    {
        $this->assertTrue(StringUtils::isEndWith('hello world', 'world'));
        $this->assertFalse(StringUtils::isEndWith('hello world', 'hello'));
    }

    public function testIsHttp()
    {
        $this->assertTrue(StringUtils::isHttp('http://example.com'));
        $this->assertTrue(StringUtils::isHttp('https://example.com'));
        $this->assertFalse(StringUtils::isHttp('ftp://example.com'));
    }

    public function testIsHttps()
    {
        $this->assertTrue(StringUtils::isHttps('https://example.com'));
        $this->assertFalse(StringUtils::isHttps('http://example.com'));
    }

    public function testIsContains()
    {
        $this->assertTrue(StringUtils::isContains('hello world', 'world'));
        $this->assertFalse(StringUtils::isContains('hello world', 'foo'));
    }

    public function testIsEmail()
    {
        $this->assertTrue(StringUtils::isEmail('test@example.com'));
        $this->assertFalse(StringUtils::isEmail('invalid_email'));
    }

    public function testIsChinesePhoneNumber()
    {
        $this->assertTrue(StringUtils::isChinesePhoneNumber('13800138000'));
        $this->assertFalse(StringUtils::isChinesePhoneNumber('1234567890'));
    }

    public function testToCamel()
    {
        $this->assertEquals('helloWorld', StringUtils::toCamel('hello_world'));
    }

    public function testMbSubstr()
    {
        $this->assertEquals('world', StringUtils::mbSubstr('hello world', 6, 5));
    }

    public function testSubstrReplace()
    {
        $this->assertEquals('hello universe', StringUtils::substrReplace('hello world', 'universe', 6, 5));
    }

    public function testTrim()
    {
        $this->assertEquals('hello', StringUtils::trim('  hello  '));
    }

    public function testTrimLeft()
    {
        $this->assertEquals('hello  ', StringUtils::trimLeft('  hello  '));
    }

    public function testTrimRight()
    {
        $this->assertEquals('  hello', StringUtils::trimRight('  hello  '));
    }

    public function testTrimAll()
    {
        $this->assertEquals('helloworld', StringUtils::trimAll('hello world'));
    }
}