<?php

declare(strict_types=1);
/**
 * This file is part of Bailing.
 *
 * @link     https://www.yunbailing.cn
 * @document https://www.yunbailing.cn/document/
 * @contact  www.yunbailing.cn 7*12 9:00-21:00
 * @license  https://www.yunbailing.cn/LICENSE
 */
namespace Endness\Helper;

use Endness\Factory\Factory;

/**
 * 常用工具类.
 * @date  2020/11/18 15:40
 */
class UtilHelper
{
    /**
     * 获取MD5.
     * @param $bodyData
     * @return string
     */
    public static function getContentMd5($bodyData)
    {
        return base64_encode(md5($bodyData, true));
    }

    /**
     * 生成签名.
     * @param $httpMethod
     * @param $accept
     * @param $contentType
     * @param $contentMd5
     * @param $date
     * @param $headers
     * @param $url
     * @return string
     */
    public static function getSignature($httpMethod, $accept, $contentType, $contentMd5, $date, $headers, $url)
    {
        $stringToSign = $httpMethod . "\n" . $accept . "\n" . $contentMd5 . "\n" . $contentType . "\n" . $date . "\n" . $headers;
        if ($headers != '') {
            $stringToSign .= "\n" . $url;
        } else {
            $stringToSign .= $url;
        }

        $signature = hash_hmac('sha256', $stringToSign, Factory::getProjectScert(), true);
        return base64_encode($signature);
    }

    // 判断是网络路径还是文件路径
    public static function isUrl($url)
    {
        $parse = parse_url($url);
        $scheme = $parse['scheme'];
        $scheme = strtolower($scheme);
        if ($scheme == 'http') {
            return true;
        }

        if ($scheme == 'https') {
            return true;
        }
        return false;
    }

    /**
     * 生成13位时间戳.
     * @return float
     */
    public static function getMillisecond()
    {
        [$t1, $t2] = explode(' ', microtime());
        return (float) sprintf('%.0f', (floatval($t1) + floatval($t2)) * 1000);
    }

    public static function jsonSer($obj)
    {
        $json = [];
        foreach ($obj as $key => $value) {
            if ($value == null) {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }

    /**
     * 获取文件的Content-MD5
     * 原理：1.先计算MD5加密的二进制数组（128位）
     * 2.再对这个二进制进行base64编码（而不是对32位字符串编码）.
     * @param mixed $filePath
     */
    public static function getContentBase64Md5($filePath)
    {
        //获取文件MD5的128位二进制数组
        $md5file = md5_file($filePath, true);
        //计算文件的Content-MD5
        return base64_encode($md5file);
    }
}
