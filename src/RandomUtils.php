<?php

namespace zhengqi\common\utils;

/**
 * 生成随机数、随机字符串
 * 如需生成全球唯一的标准UUID，推荐使用 ramsey/uuid 库
 */
class RandomUtils extends AbstractUtils
{
    /**
     * 加密安全，适合生成密码或令牌
     * 缺点：生成的字符范围有限（0-9, a-f）
     * @param int $length 理论上长度无限制
     * @return string
     * @throws \Random\RandomException
     */
    public static function random1(int $length): string
    {
        // random_bytes 生成的是二进制数据，长度为 $length / 2
        $bytes = random_bytes(ceil($length / 2));
        // 将二进制数据转换为十六进制字符串
        return substr(bin2hex($bytes), 0, $length);
    }

    /**
     * 随机生成字符串
     * 可自定义字符集
     * @param int $length 长度范围 1 ~ 62
     * @param string $characters
     * @return string
     */
    public static function random2(
        int    $length,
        string $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ): string
    {
        return substr(str_shuffle($characters), 0, $length);
    }

    /**
     * 随机生成字符串
     * 加密安全
     * 可自定义字符集
     * 缺点：性能较低
     * @param int $length 理论上长度无限制
     * @param string $characters
     * @return string
     * @throws \Random\RandomException
     */
    public static function random3(
        int    $length,
        string $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ): string
    {
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * 随机生成数字
     * 加密安全
     * @param int $length
     * @return int
     * @throws \Random\RandomException
     */
    public static function randomNumber(int $length): int
    {
        $min = pow(10, $length - 1); // 最小值，如 1000（长度为 4）
        $max = pow(10, $length) - 1; // 最大值，如 9999（长度为 4）
        return random_int($min, $max);
    }

}
