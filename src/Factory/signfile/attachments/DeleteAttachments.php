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
namespace Endness\Factory\signfile\attachements;

use Endness\Emun\HttpEmun;
use Endness\Factory\request\EsignRequest;
use JsonSerializable;

/**
 * 轩辕API流程附件删除.
 * @date  2020/11/24 14:22
 */
class DeleteAttachments extends EsignRequest implements JsonSerializable
{
    private $flowId;

    private $fileIds;

    /**
     * DeleteAttachments constructor.
     * @param $flowId
     * @param $fileIds
     */
    public function __construct($flowId, $fileIds)
    {
        $this->flowId = $flowId;
        $this->fileIds = $fileIds;
    }

    /**
     * @return mixed
     */
    public function getFlowId()
    {
        return $this->flowId;
    }

    /**
     * @param mixed $flowId
     * @return DeleteAttachments
     */
    public function setFlowId($flowId)
    {
        $this->flowId = $flowId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFileIds()
    {
        return $this->fileIds;
    }

    /**
     * @param mixed $fileIds
     * @return DeleteAttachments
     */
    public function setFileIds($fileIds)
    {
        $this->fileIds = $fileIds;
        return $this;
    }

    public function build()
    {
        $this->setUrl('/v1/signflows/' . $this->flowId . '/attachments?fileIds=' . $this->fileIds);
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
            if ($value === null || $key == 'flowId' || $key == 'fileIds') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}
