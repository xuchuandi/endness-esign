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
 * 轩辕API注销机构账号（按照账号ID注销）.
 * @date  2020/11/19 16:03
 */
class DeleteOrganizationsByOrgId extends EsignRequest implements JsonSerializable
{
    private $orgId;

    /**
     * DeleteOrganizationsByOrgId constructor.
     * @param $orgId
     */
    public function __construct($orgId)
    {
        $this->orgId = $orgId;
    }

    /**
     * @return mixed
     */
    public function getOrgId()
    {
        return $this->orgId;
    }

    /**
     * @param mixed $orgId
     */
    public function setOrgId($orgId)
    {
        $this->orgId = $orgId;
    }

    public function build()
    {
        $this->setUrl('/v1/organizations/' . $this->orgId);
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
            if ($value == null || $key == 'orgId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}
