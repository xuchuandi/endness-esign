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
namespace Endness\Factory\signfile\signers;

use Endness\Emun\HttpEmun;
use Endness\Factory\request\EsignRequest;

/**
 * 轩辕API流程签署人催签.
 * @date  2020/11/24 15:59
 */
class RushSign extends EsignRequest implements \JsonSerializable
{
    private $flowId;

    private $accountId;

    private $noticeTypes;

    private $rushsignAccountId;

    /**
     * RushSign constructor.
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
     * @return RushSign
     */
    public function setFlowId($flowId)
    {
        $this->flowId = $flowId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param mixed $accountId
     * @return RushSign
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNoticeTypes()
    {
        return $this->noticeTypes;
    }

    /**
     * @param mixed $noticeTypes
     * @return RushSign
     */
    public function setNoticeTypes($noticeTypes)
    {
        $this->noticeTypes = $noticeTypes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRushsignAccountId()
    {
        return $this->rushsignAccountId;
    }

    /**
     * @param mixed $rushsignAccountId
     * @return RushSign
     */
    public function setRushsignAccountId($rushsignAccountId)
    {
        $this->rushsignAccountId = $rushsignAccountId;
        return $this;
    }

    public function build()
    {
        $this->setUrl('/v1/signflows/' . $this->flowId . '/signers/rushsign');
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
