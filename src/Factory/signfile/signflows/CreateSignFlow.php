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

use Endness\Factory\request\EsignRequest;

/**
 * 轩辕API签署流程创建.
 * @date  2020/11/25 10:52
 */
class CreateSignFlow extends EsignRequest implements \JsonSerializable
{
    private $autoArchive;

    private $businessScene;

    private $configInfo;

    private $contractValidity;

    private $contractRemind;

    private $signValidity;

    private $initiatorAccountId;

    private $initiatorAuthorizedAccountId;

    /**
     * CreateSignFlow constructor.
     * @param $businessScene
     */
    public function __construct($businessScene)
    {
        $this->businessScene = $businessScene;
    }

    /**
     * @return mixed
     */
    public function getAutoArchive()
    {
        return $this->autoArchive;
    }

    /**
     * @param mixed $autoArchive
     * @return CreateSignFlow
     */
    public function setAutoArchive($autoArchive)
    {
        $this->autoArchive = $autoArchive;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBusinessScene()
    {
        return $this->businessScene;
    }

    /**
     * @param mixed $businessScene
     * @return CreateSignFlow
     */
    public function setBusinessScene($businessScene)
    {
        $this->businessScene = $businessScene;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConfigInfo()
    {
        return $this->configInfo;
    }

    /**
     * @param mixed $configInfo
     * @return CreateSignFlow
     */
    public function setConfigInfo($configInfo)
    {
        $this->configInfo = $configInfo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContractValidity()
    {
        return $this->contractValidity;
    }

    /**
     * @param mixed $contractValidity
     * @return CreateSignFlow
     */
    public function setContractValidity($contractValidity)
    {
        $this->contractValidity = $contractValidity;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContractRemind()
    {
        return $this->contractRemind;
    }

    /**
     * @param mixed $contractRemind
     * @return CreateSignFlow
     */
    public function setContractRemind($contractRemind)
    {
        $this->contractRemind = $contractRemind;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSignValidity()
    {
        return $this->signValidity;
    }

    /**
     * @param mixed $signValidity
     * @return CreateSignFlow
     */
    public function setSignValidity($signValidity)
    {
        $this->signValidity = $signValidity;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInitiatorAccountId()
    {
        return $this->initiatorAccountId;
    }

    /**
     * @param mixed $initiatorAccountId
     * @return CreateSignFlow
     */
    public function setInitiatorAccountId($initiatorAccountId)
    {
        $this->initiatorAccountId = $initiatorAccountId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInitiatorAuthorizedAccountId()
    {
        return $this->initiatorAuthorizedAccountId;
    }

    /**
     * @param mixed $initiatorAuthorizedAccountId
     * @return CreateSignFlow
     */
    public function setInitiatorAuthorizedAccountId($initiatorAuthorizedAccountId)
    {
        $this->initiatorAuthorizedAccountId = $initiatorAuthorizedAccountId;
        return $this;
    }

    public function build()
    {
        $this->setUrl('/v1/signflows');
        $this->setReqType(\HttpEmun::POST);
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