<?php

namespace zhengqi\common\utils;

use Datetime;
use DateTimeZone;

/**
 * 日期时间处理工具类
 */
class DateTimeUtils extends AbstractUtils
{

    /**
     * 获取毫秒级时间戳
     * @return int
     */
    public static function nowTimeMillis(): int
    {
        $nanoseconds = hrtime(true); // 获取纳秒级时间戳
        return (int)($nanoseconds / 1e6); // 转换为毫秒
    }

    /**
     * 获取秒级时间戳
     * @return int
     */
    public static function nowTime(): int
    {
        return time();
    }

    /**
     * 获取当前日期
     * @param string $format
     * @return string
     */
    public static function now(string $format = 'Y-m-d H:i:s'): string
    {
        return date($format);
    }

    /**
     * 秒级时间戳格式化为日期
     * @param int $timestamp
     * @param string $format
     * @return string
     */
    public static function format(int $timestamp, string $format = 'Y-m-d H:i:s'): string
    {
        return date($format, $timestamp);
    }


    /**
     * 秒级时间戳格式化为指定时区的日期
     * @param int $timestamp
     * @param string $timezone
     * @param string $format
     * @return string
     */
    public static function formatWithTimezone(
        int    $timestamp,
        string $timezone,
        string $format = 'Y-m-d H:i:s'
    ): string
    {
        $datetime = new DateTime();
        // 设置时间戳
        $datetime->setTimestamp($timestamp);
        // 设置时区
        $datetime->setTimezone(new DateTimeZone($timezone));
        // 格式化输出
        return $datetime->format($format);
    }

    /**
     * 日期转换时区
     * @param string $datetime
     * @param string $originalTimezone
     * @param string $targetTimezone
     * @param string $format
     * @return string
     */
    public static function changeTimezone(
        string $datetime,
        string $originalTimezone,
        string $targetTimezone = 'UTC',
        string $format = 'Y-m-d H:i:s'
    ): string
    {
        // 创建一个 DateTime 对象，初始化为当前时间或指定时间
        $dateTime = new DateTime($datetime, new DateTimeZone($originalTimezone));
        // 设置时区
        $dateTime->setTimezone(new DateTimeZone($targetTimezone));
        // 格式化输出
        return $dateTime->format($format);
    }

    /**
     * 指定时区的日期转时间戳
     * @param string $datetime
     * @param string $timezone
     * @return int
     */
    public static function toTimeWithTimezone(string $datetime, string $timezone = "UTC"): int
    {
        $date = new DateTime($datetime, new DateTimeZone($timezone));
        return $date->getTimestamp();
    }

    /**
     * 日期转时间戳
     * @param string $datetime
     * @return int
     */
    public static function toTime(string $datetime): int
    {
        return strtotime($datetime);
    }


    /**
     * 根据生日计算年龄
     * @param string $birthday
     * @return int
     */
    public static function birthdayToAge(string $birthday): int
    {
        $birthDate = new DateTime($birthday);
        $currentDate = new DateTime();

        $age = $currentDate->diff($birthDate);

        return $age->y;
    }

    /**
     * 指定日期当天的开始时间
     * @param string $datetime
     * @param string $format
     * @return string
     */
    public static function getDayStart(string $datetime, string $format = 'Y-m-d H:i:s'): string
    {
        $date = new DateTime($datetime);
        // 获取当天的开始时间（00:00:00）
        $date->setTime(0, 0, 0);

        return $date->format($format);
    }

    /**
     * 指定日期当天的结束时间
     * @param string $datetime
     * @param string $format
     * @return string
     */
    public static function getDayEnd(string $datetime, string $format = 'Y-m-d H:i:s'): string
    {
        $date = new DateTime($datetime);
        // 获取当天的结束时间（23:59:59）
        $date->setTime(23, 59, 59);

        return $date->format($format);
    }

    /**
     * 指定日期当天的开始时间和结束时间
     * @param string $datetime
     * @param string $format
     * @return string
     */
    public static function getDayStartAndEnd(string $datetime, string $format = 'Y-m-d H:i:s'): array
    {
        $date = new DateTime($datetime);

        // 获取当天的开始时间（00:00:00）
        $startOfDay = clone $date;
        $startOfDay->setTime(0, 0, 0);

        // 获取当天的结束时间（23:59:59）
        $endOfDay = clone $date;
        $endOfDay->setTime(23, 59, 59);

        return [
            'start' => $startOfDay->format($format),
            'end' => $endOfDay->format($format)
        ];
    }

    /**
     * 获取 周 开始时间
     * @param string $datetime
     * @param string $format
     * @return string
     */
    public static function getWeekStart(string $datetime, string $format = 'Y-m-d H:i:s'): string
    {
        $date = new DateTime($datetime);
        // 获取当周的开始时间（周一 00:00:00）
        $date->modify('this week')->setTime(0, 0, 0);

        return $date->format($format);
    }

    /**
     * 获取 周 结束时间
     * @param string $datetime
     * @param string $format
     * @return string
     */
    public static function getWeekEnd(string $datetime, string $format = 'Y-m-d H:i:s'): string
    {
        $date = new DateTime($datetime);
        // 获取当周的结束时间（周日 23:59:59）
        $date->modify('this week +6 days')->setTime(23, 59, 59);

        return $date->format($format);
    }

    /**
     * 获取 周 开始和结束时间
     * @param $datetime
     * @return array
     */
    public static function getWeekStartAndEnd(string $datetime, string $format = 'Y-m-d H:i:s'): array
    {
        $date = new DateTime($datetime);

        // 获取当周的开始时间（周一 00:00:00）
        $startOfWeek = clone $date;
        $startOfWeek->modify('this week')->setTime(0, 0, 0);

        // 获取当周的结束时间（周日 23:59:59）
        $endOfWeek = clone $date;
        $endOfWeek->modify('this week +6 days')->setTime(23, 59, 59);

        return [
            'start' => $startOfWeek->format($format),
            'end' => $endOfWeek->format($format)
        ];
    }


    /**
     * 获取 月 开始时间
     * @param string $datetime
     * @param string $format
     * @return string
     */
    public static function getMonthStart(string $datetime, string $format = 'Y-m-d H:i:s'): string
    {
        $date = new DateTime($datetime);
        // 设置当前日期所在月的开始时间（第一天）
        $date->modify('first day of this month')->setTime(0, 0, 0);

        // 格式化输出
        return $date->format($format);
    }

    /**
     * 获取 月 结束时间
     * @param string $datetime
     * @param string $format
     * @return string
     */
    public static function getMonthEnd(string $datetime, string $format = 'Y-m-d H:i:s'): string
    {
        $date = new DateTime($datetime);
        // 设置当前日期所在月的结束时间（最后一天）
        $date->modify('last day of this month')->setTime(23, 59, 59);

        // 格式化输出
        return $date->format($format);
    }

    /**
     * 获取 月 开始时间和结束时间
     * @param string $datetime
     * @param string $format
     * @return array
     */
    public static function getMonthStartAndEnd(string $datetime, string $format = 'Y-m-d H:i:s'): array
    {
        $date = new DateTime($datetime);

        // 设置当前日期所在月的开始时间（第一天）
        $startOfMonth = clone $date;
        $startOfMonth->modify('first day of this month')->setTime(0, 0, 0);

        // 设置当前日期所在月的结束时间（最后一天）
        $endOfMonth = clone $date;
        $endOfMonth->modify('last day of this month')->setTime(23, 59, 59);

        // 格式化输出
        return [
            'start' => $startOfMonth->format($format),
            'end' => $endOfMonth->format($format),
        ];
    }


    /**
     * 获取 年 的开始时间
     * @param string $datetime
     * @param string $format
     * @return string
     */
    public static function getYearStart(string $datetime, string $format = 'Y-m-d H:i:s'): string
    {
        $date = new DateTime($datetime);
        // 设置当前日期所在年的开始时间（第一天）
        $date->modify('first day of this year')->setTime(0, 0, 0);

        // 格式化输出
        return $date->format($format);
    }


    /**
     * 获取 年 结束时间
     * @param string $datetime
     * @param string $format
     * @return string
     */
    public static function getYearEnd(string $datetime, string $format = 'Y-m-d H:i:s'): string
    {
        $date = new DateTime($datetime);
        // 设置当前日期所在年的结束时间（最后一天）
        $date->modify('last day of this year')->setTime(23, 59, 59);

        // 格式化输出
        return $date->format($format);
    }

    /**
     * 获取 年 的开始时间和结束时间
     * @param string $datetime
     * @param string $format
     * @return array
     */
    public static function getYearStartAndEnd(string $datetime, string $format = 'Y-m-d H:i:s'): array
    {
        $date = new DateTime($datetime);

        // 设置当前日期所在年的开始时间（第一天）
        $startOfYear = clone $date;
        $startOfYear->modify('first day of this year')->setTime(0, 0, 0);

        // 设置当前日期所在年的结束时间（最后一天）
        $endOfYear = clone $date;
        $endOfYear->modify('last day of this year')->setTime(23, 59, 59);

        // 格式化输出
        return [
            'start' => $startOfYear->format($format),
            'end' => $endOfYear->format($format),
        ];
    }


}
