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
 * 轩辕API查询机构账号（按照第三方机构ID查询）.
 * @date  2020/11/20 10:18
 */
class QryOrganizationsByThirdId extends EsignRequest implements JsonSerializable
{
    private $thirdPartyUserId;

    /**
     * QryOrganizationsByThirdId constructor.
     * @param $thirdPartyUserId
     */
    public function __construct($thirdPartyUserId)
    {
        $this->thirdPartyUserId = $thirdPartyUserId;
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

    public function build()
    {
        $this->setUrl('/v1/organizations/getByThirdId?thirdPartyUserId=' . $this->thirdPartyUserId);
        $this->setReqType(HttpEmun::GET);
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
            if ($value == null || $key == 'thirdPartyUserId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}