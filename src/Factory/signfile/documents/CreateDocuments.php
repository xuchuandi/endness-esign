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
 * 轩辕API流程文档添加.
 * @date  2020/11/24 14:33
 */
class CreateDocuments extends EsignRequest implements \JsonSerializable
{
    private $flowId;

    private $docs;

    /**
     * CreateDocuments constructor.
     * @param $flowId
     * @param $docs
     */
    public function __construct($flowId, $docs)
    {
        $this->flowId = $flowId;
        $this->docs = $docs;
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
     * @return CreateDocuments
     */
    public function setFlowId($flowId)
    {
        $this->flowId = $flowId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDocs()
    {
        return $this->docs;
    }

    /**
     * @param mixed $docs
     * @return CreateDocuments
     */
    public function setDocs($docs)
    {
        $this->docs = $docs;
        return $this;
    }

    public function build()
    {
        $this->setUrl('/v1/signflows/' . $this->flowId . '/documents');
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
            if ($value === null || $key == 'flowId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}
