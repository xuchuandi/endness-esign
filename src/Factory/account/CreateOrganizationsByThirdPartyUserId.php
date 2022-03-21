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
namespace Endness\Factory\account;

use Endness\Emun\HttpEmun;
use Endness\Factory\request\EsignRequest;
use JsonSerializable;

/**
 * 轩辕API机构账号创建.
 * @date  2020/11/19 14:57
 */
class CreateOrganizationsByThirdPartyUserId extends EsignRequest implements JsonSerializable
{
    private $thirdPartyUserId;

    private $creator = '';

    private $name;

    private $idType;

    private $idNumber;

    private $orgLegalIdNumber;

    private $orgLegalName;

    /**
     * CreateOrganizationsByThirdPartyUserId constructor.
     * @param $thirdPartyUserId
     * @param $creator
     * @param $name
     * @param $idType
     * @param $idNumber
     */
    public function __construct($thirdPartyUserId, $name, $idType, $idNumber, $creator = null)
    {
        $this->thirdPartyUserId = $thirdPartyUserId;
        ! empty($creator) && $this->creator = $creator;
        $this->name = $name;
        $this->idType = $idType;
        $this->idNumber = $idNumber;
    }

    /**
     * @return mixed
     */
    public function getThirdPartyUserId()
    {
        return $this->thirdPartyUserId;
    }

    /**
     * @param mixed $thirdPartyUserId
     */
    public function setThirdPartyUserId($thirdPartyUserId)
    {
        $this->thirdPartyUserId = $thirdPartyUserId;
    }

    /**
     * @return mixed
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @param mixed $creator
     */
    public function setCreator($creator)
    {
        $this->creator = $creator;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getIdType()
    {
        return $this->idType;
    }

    /**
     * @param mixed $idType
     */
    public function setIdType($idType)
    {
        $this->idType = $idType;
    }

    /**
     * @return mixed
     */
    public function getIdNumber()
    {
        return $this->idNumber;
    }

    /**
     * @param mixed $idNumber
     */
    public function setIdNumber($idNumber)
    {
        $this->idNumber = $idNumber;
    }

    /**
     * @return mixed
     */
    public function getOrgLegalIdNumber()
    {
        return $this->orgLegalIdNumber;
    }

    /**
     * @param mixed $orgLegalIdNumber
     */
    public function setOrgLegalIdNumber($orgLegalIdNumber)
    {
        $this->orgLegalIdNumber = $orgLegalIdNumber;
    }

    /**
     * @return mixed
     */
    public function getOrgLegalName()
    {
        return $this->orgLegalName;
    }

    /**
     * @param mixed $orgLegalName
     */
    public function setOrgLegalName($orgLegalName)
    {
        $this->orgLegalName = $orgLegalName;
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
            if ($value == null) {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }

    public function build()
    {
        $this->setUrl('/v1/organizations/createByThirdPartyUserId');
        $this->setReqType(HttpEmun::POST);
    }
}
