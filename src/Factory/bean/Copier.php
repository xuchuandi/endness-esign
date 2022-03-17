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
namespace Endness\Factory\bean;

/**
 * 轩辕API.
 * @date  2020/11/24 13:59
 */
class Copier implements \JsonSerializable
{
    private $copierAccountId;

    private $copierIdentityAccountType;

    private $copierIdentityAccountId;

    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getCopierAccountId()
    {
        return $this->copierAccountId;
    }

    /**
     * @param mixed $copierAccountId
     */
    public function setCopierAccountId($copierAccountId)
    {
        $this->copierAccountId = $copierAccountId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCopierIdentityAccountType()
    {
        return $this->copierIdentityAccountType;
    }

    /**
     * @param mixed $copierIdentityAccountType
     */
    public function setCopierIdentityAccountType($copierIdentityAccountType)
    {
        $this->copierIdentityAccountType = $copierIdentityAccountType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCopierIdentityAccountId()
    {
        return $this->copierIdentityAccountId;
    }

    /**
     * @param mixed $copierIdentityAccountId
     */
    public function setCopierIdentityAccountId($copierIdentityAccountId)
    {
        $this->copierIdentityAccountId = $copierIdentityAccountId;
        return $this;
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
