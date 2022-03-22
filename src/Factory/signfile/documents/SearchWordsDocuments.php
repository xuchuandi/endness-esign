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
namespace Endness\Factory\signfile\documents;

use Endness\Emun\HttpEmun;
use Endness\Factory\request\EsignRequest;

/**
 *  流程文档-搜索关键字坐标(签署场景).
 * @date  2020/11/24 14:37
 */
class SearchWordsDocuments extends EsignRequest implements \JsonSerializable
{
    private $fileId;

    /**
     * DeleteDocuments constructor.
     * @param $fileIds
     * @param mixed $fileId
     */
    public function __construct($fileId)
    {
        $this->fileId = $fileId;
    }

    /**
     * @return mixed
     */
    public function getFileId()
    {
        return $this->fileId;
    }

    /**
     * @param mixed $fileIds
     * @param mixed $fileId
     * @return DeleteDocuments
     */
    public function setFileId($fileId)
    {
        $this->fileId = $fileId;
        return $this;
    }

    public function build()
    {
        $this->setUrl('/v1/documents/' . $this->fileId . '/searchWordsPosition');
        $this->setReqType(HttpEmun::DELETE);
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
            if ($value === null || $key == 'fileId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}
