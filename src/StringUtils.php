<?php

namespace zhengqi\common\utils;

/**
 * 字符串处理工具类
 */
class StringUtils extends AbstractUtils
{
    /**
     * 判断值是否为 null
     * @param $object
     * @return bool
     */
    public static function isNull($object): bool
    {
        return is_null($object);
    }

    /**
     * 判断值是否为 null
     * @param $object
     * @return bool
     */
    public static function isNotNull($object): bool
    {
        return !is_null($object);
    }

    /**
     * 判断对象是否为空
     * 未定义变量、null、空字符串“”、字符串“0”、整数0、浮点数 0.0、空数组[]、布尔值false
     * @param $object
     * @return bool
     */
    public static function isEmpty($object): bool
    {
        return empty($object);
    }

    /**
     * 判断对象是否为空
     * 未定义变量、null、空字符串“”、字符串“0”、整数0、浮点数 0.0、空数组[]、布尔值false
     * @param $object
     * @return bool
     */
    public static function isNotEmpty($object): bool
    {
        return !empty($object);
    }

    /**
     * 指定字符串 开头
     * @param string $string 待检测字符串
     * @param string $needle
     * @return bool
     */
    public static function isStartWith(string $string, string $needle): bool
    {
        return strpos($string, $needle) === 0;
    }

    /**
     * 指定字符串 结尾
     * @param string $string 待检测字符串
     * @param string $needle
     * @return bool
     */
    public static function isEndWith(string $string, string $needle): bool
    {
        $needleLength = strlen($needle);
        // 空后缀默认 不匹配
        if ($needleLength === 0) {
            return false;
        }
        return substr($string, -$needleLength) === $needle;
    }

    /**
     * 检测字符串是否是 http(s) 链接
     * @param string $string
     * @return bool
     */
    public static function isHttp(string $string): bool
    {
        return self::isStartWith($string, 'http') || self::isStartWith($string, 'https');
    }

    /**
     * 检测字符串是否是 https 链接
     * @param string $string
     * @return bool
     */
    public static function isHttps(string $string): bool
    {
        return self::isStartWith($string, 'http') || self::isStartWith($string, 'https');
    }

    /**
     * 检测字符串中是否包含 {$needle}
     * @param string $string
     * @param string $needle
     * @return bool
     */
    public static function isContains(string $string, string $needle): bool
    {
        return strpos($string, $needle) !== false;
    }

    /**
     * 验证 email
     * @param string $email
     * @return bool
     */
    public static function isEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * 验证是否是11位中国手机号
     * @param string $phone
     * @return bool
     */
    public static function isChinesePhoneNumber(string $phone): bool
    {
        return preg_match('/^1[3-9]\d{9}$/', $phone) === 1;
    }

    /**
     * 将字符串转换为驼峰形式
     * @param string $string 待处理的字符串
     * @param string $separator 分隔符， 默认是下划线“_”
     * @return string
     */
    public static function toCamel(string $string, string $separator = '_'): string
    {
        return lcfirst(
            str_replace(
                ' ',
                '',
                ucwords(
                    str_replace($separator, ' ', $string)
                )
            )
        );
    }

    /**
     * 将字符串转换为蛇形命名
     * @param string $string 待处理的字符串
     * @param string $separator 分隔符，默认下划线“_”
     * @return string
     */
    public static function toSnake(string $string, string $separator = '_'): string
    {
        return strtolower(
            preg_replace('/(?<!^)[A-Z]/', $separator . '$0', $string)
        );
    }

    /**
     * 以指定 分隔符 将字符串分割为 数组
     * @param string $string
     * @param string $separator
     * @return array
     */
    public static function toArray(string $string, string $separator = '_'): array
    {
        return explode($string, $separator);
    }

    /**
     * 分割字符串
     * @param string $string
     * @param int $start
     * @param int $end
     * @param string $encoding
     * @return string
     */
    public static function mbSubstr(string $string, int $start, int $end, string $encoding = 'UTF-8'): string
    {
        return mb_substr($string, $start, $end, $encoding);
    }


    /**
     * 指定位置范围 替换为指定字符串
     * @param string $string
     * @param string $replacement
     * @param int $start
     * @param int $length
     * @return string
     */
    public static function substrReplace(string $string, string $replacement, int $start, int $length): string
    {
        return substr_replace($string, $replacement, $start, $length);
    }


    /**
     * 去除字符串【前后】的空格
     */
    public static function trim(string $string): string
    {
        return trim($string);
    }

    /**
     * 去除字符串【左侧】的空格
     */
    public static function trimLeft(string $string): string
    {
        return ltrim($string);
    }

    /**
     * 去除字符串【右侧】的空格
     */
    public static function trimRight(string $string): string
    {
        return rtrim($string);
    }

    /**
     * 去除字符串中【所有】的空格
     */
    public static function trimAll(string $string): string
    {
        return str_replace(' ', '', $string);
    }
}