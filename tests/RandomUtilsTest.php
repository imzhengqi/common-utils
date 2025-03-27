<?php

use PHPUnit\Framework\TestCase;
use zhengqi\common\utils\RandomUtils;

class RandomUtilsTest extends TestCase
{
    public function testRandom1()
    {
        try {
            $length = 10;
            $result = RandomUtils::random1($length);
            $this->assertEquals($length, strlen($result));
        } catch (\Random\RandomException $e) {
            $this->fail("Exception thrown: " . $e->getMessage());
        }
    }

    public function testRandom2()
    {
        $length = 10;
        $result = RandomUtils::random2($length);
        $this->assertEquals($length, strlen($result));
    }

    public function testRandom3()
    {
        try {
            $length = 10;
            $result = RandomUtils::random3($length);
            $this->assertEquals($length, strlen($result));
        } catch (\Random\RandomException $e) {
            $this->fail("Exception thrown: " . $e->getMessage());
        }
    }

    public function testRandomNumber()
    {
        try {
            $length = 4;
            $result = RandomUtils::randomNumber($length);
            $this->assertEquals($length, strlen((string)$result));
        } catch (\Random\RandomException $e) {
            $this->fail("Exception thrown: " . $e->getMessage());
        }
    }
}