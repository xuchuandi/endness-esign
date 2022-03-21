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
namespace Endness\Factory\signfile\signflows;

use Endness\Emun\HttpEmun;
use Endness\Factory\request\EsignRequest;

/**
 * 轩辕API签署流程撤销
 * @date  2020/11/25 11:01
 */
class RevokeSignFlow extends EsignRequest implements \JsonSerializable
{
    private $flowId;

    private $operatorId;

    private $revokeReason;

    /**
     * RevokeSignFlow constructor.
     * @param $flowId
     */
    public function __construct($flowId)
    {
        $this->flowId = $flowId;
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
     * @return RevokeSignFlow
     */
    public function setFlowId($flowId)
    {
        $this->flowId = $flowId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOperatorId()
    {
        return $this->operatorId;
    }

    /**
     * @param mixed $operatorId
     * @return RevokeSignFlow
     */
    public function setOperatorId($operatorId)
    {
        $this->operatorId = $operatorId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRevokeReason()
    {
        return $this->revokeReason;
    }

    /**
     * @param mixed $revokeReason
     * @return RevokeSignFlow
     */
    public function setRevokeReason($revokeReason)
    {
        $this->revokeReason = $revokeReason;
        return $this;
    }

    public function build()
    {
        $this->setUrl('/v1/signflows/' . $this->flowId . '/revoke');
        $this->setReqType(HttpEmun::PUT);
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
