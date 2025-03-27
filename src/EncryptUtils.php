<?php

namespace zhengqi\common\utils;

/**
 * 加密工具类
 */
class EncryptUtils extends AbstractUtils
{
    /**
     * 不可逆加密，比如存储密码
     * @param string $string
     * @return string 加密后的 hash值
     */
    public static function passwordHash(string $string): string
    {
        return password_hash($string, PASSWORD_DEFAULT);
    }

    /**
     * 校验哈希值，比如验证用户输入的密码是否正确
     * @param string $string
     * @param $hashString
     * @return bool
     */
    public static function passwordVerify(string $string, $hashString): bool
    {
        return password_verify($string, $hashString);
    }

    /**
     * 使用 HMAC生成消息认证码
     * @param string $string
     * @param string $key
     * @return string
     */
    public static function hmac(string $string, string $key = 'your-secret-key'): string
    {
        return hash_hmac('sha256', $string, $key);
    }

    /**
     * @param string $string
     * @return string
     */
    public static function md5(string $string): string
    {
        return md5($string);
    }

    /**
     * @param string $string
     * @return string
     */
    public static function sha1(string $string): string
    {
        return sha1($string);
    }

    /**
     * RSA加密
     * @param string $string
     * @param $publicKey
     * @return string
     */
    public static function encryptRSA(string $string, $publicKey): string
    {
        $encrypted = '';
        openssl_public_encrypt($string, $encrypted, $publicKey);
        return base64_encode($encrypted);
    }

    /**
     * RSA解密
     * @param string $encodeString
     * @param $privateKey
     * @return string
     */
    public static function decryptRSA(string $encodeString, $privateKey): string
    {
        $encodeString = base64_decode($encodeString);
        $decrypted = '';
        openssl_private_decrypt($encodeString, $decrypted, $privateKey);
        return $decrypted;
    }

    /**
     * 使用AES进行数据加密
     * @param string $string
     * @param string $method
     * @param string $key
     * @return string
     */
    public static function encryptAES(string $string, string $key = 'your-secret-key', string $method = 'AES-256-CBC'): string
    {
        $ivlen = openssl_cipher_iv_length($method);
        $iv = openssl_random_pseudo_bytes($ivlen);
        $encrypted = openssl_encrypt($string, $method, $key, OPENSSL_RAW_DATA, $iv);
        return base64_encode($iv . $encrypted);
    }

    /**
     * 使用AES进行数据解密
     * @param string $encodeString
     * @param string $method
     * @param string $key
     * @return string|false
     */
    public static function decryptAES(string $encodeString, string $key = 'your-secret-key', string $method = 'AES-256-CBC'): string|false
    {
        $encodeString = base64_decode($encodeString);
        $ivlen = openssl_cipher_iv_length($method);
        $iv = substr($encodeString, 0, $ivlen);
        $encrypted = substr($encodeString, $ivlen);
        return openssl_decrypt($encrypted, $method, $key, OPENSSL_RAW_DATA, $iv);
    }

}