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
namespace Endness\Factory\filetemplate;

use Endness\Helper\HttpHelper;

/**
 * 轩辕API文件流上传.
 * @date  2020/11/23 15:46
 */
class UploadFile
{
    private $filePath;

    private $contentType;

    private $url;

    /**
     * UploadFile constructor.
     * @param $filePath
     * @param $contentType
     * @param $url
     */
    public function __construct($filePath, $contentType, $url)
    {
        $this->filePath = $filePath;
        $this->contentType = $contentType;
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * @param mixed $filePath
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @return mixed
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @param mixed $contentType
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function execute()
    {
        return HttpHelper::upLoadFileHttp($this->url, $this->filePath, $this->contentType);
    }
}
