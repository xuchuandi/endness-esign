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

use Endness\Emun\HttpEmun;
use Endness\Factory\request\EsignRequest;

/**
 * 轩辕API通过上传方式创建模板
 * @date  2020/11/23 11:15
 */
class CreateTemplateByUploadUrl extends EsignRequest implements \JsonSerializable
{
    private $contentMd5;

    private $contentType;

    private $fileName;

    private $convert2Pdf;

    /**
     * CreateTemplateByUploadUrl constructor.
     * @param $contentMd5
     * @param $contentType
     * @param $fileName
     * @param $convert2Pdf
     */
    public function __construct($contentMd5, $contentType, $fileName, $convert2Pdf = false)
    {
        $this->contentMd5 = $contentMd5;
        $this->contentType = $contentType;
        $this->fileName = $fileName;
        $this->convert2Pdf = $convert2Pdf;
    }

    /**
     * @return mixed
     */
    public function getContentMd5()
    {
        return $this->contentMd5;
    }

    /**
     * @param mixed $contentMd5
     */
    public function setContentMd5($contentMd5)
    {
        $this->contentMd5 = $contentMd5;
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
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param mixed $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @return mixed
     */
    public function getConvert2Pdf()
    {
        return $this->convert2Pdf;
    }

    /**
     * @param mixed $convert2Pdf
     */
    public function setConvert2Pdf($convert2Pdf)
    {
        $this->convert2Pdf = $convert2Pdf;
    }

    public function build()
    {
        $this->setUrl('/v1/docTemplates/createByUploadUrl');
        $this->setReqType(HttpEmun::POST);
    }

    /**
     * Specify data which should be serialized to JSON.
     * @see https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     *               which is a value of any type other than a resource
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        $json = [];
        foreach ($this as $key => $value) {
            if ($value === null) {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}
