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
use Endness\Factory\response\EsignResponse;

//require (__DIR__.'/UtilHelper.php');
//require (__DIR__.'/HttpCfgHelper.php');
/**
 * 轩辕APIhttp请求类.
 * @date  2020/11/18 15:10
 * @version JDK1.7
 */
class HttpHelper
{
    /**
     * 常规请求
     * @param $reqType
     * @param $url
     * @param $paramStr
     * @return EsignResponse
     */
    public static function doCommHttp($reqType, $url, $paramStr)
    {
        //		get和delete方式请求不能携带body体
        if (strtoupper($reqType) == 'GET' || strtoupper($reqType) == 'DELETE') {
            $paramStr = '';
        }
        //对body体做md5摘要
        $contentMd5 = UtilHelper::getContentMd5($paramStr);

        //传入生成的bodyMd5,加上其他请求头部信息拼接成字符串,整体做sha256签名
        $reqSignature = UtilHelper::getSignature($reqType, '*/*', 'application/json; charset=UTF-8', $contentMd5, '', '', $url);
        $url = Factory::getHost() . $url;
        //解决get请求搜索关键词坐标位置api中的中文乱码问题
        if (strtoupper($reqType) == 'GET' && strpos($url, '/searchWordsPosition') !== false && strpos($url, '?') !== false) {
            $urlDomain = strstr($url, '?', true);
            parse_str(substr($url, intval(strpos($url, '?') + 1)), $urlPatch);
            $urlParams = http_build_query($urlPatch);
            $url = $urlDomain . '?' . $urlParams;
        }

        return HttpCfgHelper::sendHttp($reqType, $url, self::buildCommHeader($contentMd5, $reqSignature), $paramStr);
    }

    /**
     * 文件上传.
     * @param $uploadUrls
     * @param $filePath
     * @param $ContenType
     * @return EsignResponse
     */
    public static function upLoadFileHttp($uploadUrls, $filePath, $ContenType)
    {
        $fileContent = file_get_contents($filePath);
        $contentBase64Md5 = UtilHelper::getContentBase64Md5($filePath);
        return HttpCfgHelper::upLoadFileHttp($uploadUrls, $contentBase64Md5, $fileContent, $ContenType);
    }

    /**
     * 构造头部信息.
     * @param $contentMD5
     * @param $reqSignature
     * @return array
     */
    public static function buildCommHeader($contentMD5, $reqSignature)
    {
        return [
            'X-Tsign-Open-App-Id:' . Factory::getProjectId(),
            'X-Tsign-Open-Ca-Timestamp:' . UtilHelper::getMillisecond(),
            'Accept:*/*',
            'X-Tsign-Open-Ca-Signature:' . $reqSignature,
            'Content-MD5:' . $contentMD5,
            'Content-Type:application/json; charset=UTF-8',
            'X-Tsign-Open-Auth-Mode:Signature',
        ];
    }
}
