<?php

namespace zhengqi\common\utils;


/**
 * IP地址处理工具类
 * TODO - 查询IP地址信息
 */
class IpUtils extends AbstractUtils
{
    /**
     * 验证 IP地址有效性
     * @param string $ip
     * @return bool
     */
    public static function isValidIp(string $ip): bool
    {
        return filter_var($ip, FILTER_VALIDATE_IP);
    }

    /**
     * 获取IP地址
     * @return string
     */
    public static function getClientIp(): string
    {
        $ip = '';

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            // 1. 检查是否通过 HTTP_CLIENT_IP 头传递
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // 2. 检查是否通过 HTTP_X_FORWARDED_FOR 头传递（可能包含多个 IP，取第一个）
            $ipList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $ip = trim($ipList[0]); // 取第一个 IP
        } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
            // 3. 直接获取 REMOTE_ADDR
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        // 验证 IP 地址的有效性
        // 如果无法获取有效 IP，返回空字符串
        return self::isValidIp($ip) ? $ip : '';
    }

}
