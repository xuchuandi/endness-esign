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
namespace Endness\Factory\base;

use Endness\Factory\account\CreateOrganizationsByThirdPartyUserId;
use Endness\Factory\account\CreatePersonByThirdPartyUserId;
use Endness\Factory\account\DeleteOrganizationsByOrgId;
use Endness\Factory\account\DeleteOrganizationsByThirdId;
use Endness\Factory\account\DeletePersonByAccountId;
use Endness\Factory\account\DeletePersonByThirdId;
use Endness\Factory\account\DeleteSignAuth;
use Endness\Factory\account\QryOrganizationsByOrgId;
use Endness\Factory\account\QryOrganizationsByThirdId;
use Endness\Factory\account\QryPersonByaccountId;
use Endness\Factory\account\QryPersonByThirdId;
use Endness\Factory\account\SetSignAuth;
use Endness\Factory\account\SetSignPwd;
use Endness\Factory\account\UpdateOrganizationsByOrgId;
use Endness\Factory\account\UpdateOrganizationsByThirdId;
use Endness\Factory\account\UpdatePersonAccountByAccountId;
use Endness\Factory\account\UpdatePersonAccountByThirdId;

/**
 * 轩辕API账号相关功能类.
 * @date  2020/11/19 14:12
 */
class Account
{
    /**
     * 个人账号创建.
     * @param $thirdPartyUserId
     * @param $name
     * @param $idType
     * @param $idNumber
     * @return CreatePersonByThirdPartyUserId
     */
    public static function createPersonByThirdPartyUserId($thirdPartyUserId, $name, $idType, $idNumber)
    {
        return new CreatePersonByThirdPartyUserId($thirdPartyUserId, $name, $idType, $idNumber);
    }

    /**
     * 机构账号创建. (ps:自2021年11月15日起，creator此字段调整为非必填，建议不传此值。).
     * @param $thirdPartyUserId
     * @param $creator
     * @param $name
     * @param $idType
     * @param $idNumber
     * @return CreateOrganizationsByThirdPartyUserId
     */
    public static function createOrganizationsByThirdPartyUserId($thirdPartyUserId, $name, $idType, $idNumber, $creator = null)
    {
        return new CreateOrganizationsByThirdPartyUserId($thirdPartyUserId, $name, $idType, $idNumber, $creator);
    }

    /**
     * 注销机构账号（按照账号ID注销）.
     * @param $orgId
     * @return DeleteOrganizationsByOrgId
     */
    public static function deleteOrganizationsByOrgId($orgId)
    {
        return new DeleteOrganizationsByOrgId($orgId);
    }

    /**
     * 注销机构账号（按照第三方机构ID注销）.
     * @param $thirdPartyUserId
     * @return DeleteOrganizationsByThirdId
     */
    public static function deleteOrganizationsByThirdId($thirdPartyUserId)
    {
        return new DeleteOrganizationsByThirdId($thirdPartyUserId);
    }

    /**
     * 注销个人账户（按照账号ID注销）.
     * @param $accountId
     * @return DeletePersonByAccountId
     */
    public static function deletePersonByAccountId($accountId)
    {
        return new DeletePersonByAccountId($accountId);
    }

    /**
     * 注销个人账户（按照第三方用户ID注销）.
     * @param $thirdPartyUserId
     * @return DeletePersonByThirdId
     */
    public static function deletePersonByThirdId($thirdPartyUserId)
    {
        return new DeletePersonByThirdId($thirdPartyUserId);
    }

    /**
     * 撤销静默签署.
     * @param $accountId
     * @return DeleteSignAuth
     */
    public static function deleteSignAuth($accountId)
    {
        return new DeleteSignAuth($accountId);
    }

    /**
     * 查询机构账号（按照账号ID查询）.
     * @param $orgId
     * @return QryOrganizationsByOrgId
     */
    public static function qryOrganizationsByOrgId($orgId)
    {
        return new QryOrganizationsByOrgId($orgId);
    }

    /**
     * 查询机构账号（按照第三方机构ID查询）.
     * @param $thirdPartyUserId
     * @return QryOrganizationsByThirdId
     */
    public static function qryOrganizationsByThirdId($thirdPartyUserId)
    {
        return new QryOrganizationsByThirdId($thirdPartyUserId);
    }

    /**
     * 查询机构账号（按照账号ID查询）.
     * @param $accountId
     * @return QryPersonByaccountId
     */
    public static function qryPersonByaccountId($accountId)
    {
        return new QryPersonByaccountId($accountId);
    }

    /**
     * 查询个人账户（按照第三方用户ID查询）.
     * @param $thirdPartyUserId
     * @return QryPersonByThirdId
     */
    public static function qryPersonByThirdId($thirdPartyUserId)
    {
        return new QryPersonByThirdId($thirdPartyUserId);
    }

    /**
     * 设置静默签署.
     * @param $accountId
     * @return SetSignAuth
     */
    public static function setSignAuth($accountId)
    {
        return new SetSignAuth($accountId);
    }

    /**
     * 设置签署密码
     * @param $accountId
     * @param $password
     * @return SetSignPwd
     */
    public static function setSignPwd($accountId, $password)
    {
        return new SetSignPwd($accountId, $password);
    }

    /**
     * 机构账号修改（按照账号ID修改）.
     * @param $orgId
     * @return UpdateOrganizationsByOrgId
     */
    public static function updateOrganizationsByOrgId($orgId)
    {
        return new UpdateOrganizationsByOrgId($orgId);
    }

    /**
     * 机构账号修改（按照第三方机构ID修改）.
     * @param $thirdPartyUserId
     * @return UpdateOrganizationsByThirdId
     */
    public static function updateOrganizationsByThirdId($thirdPartyUserId)
    {
        return new UpdateOrganizationsByThirdId($thirdPartyUserId);
    }

    /**
     * 个人账户修改(按照账号ID修改).
     * @param $accountId
     * @return UpdatePersonAccountByAccountId
     */
    public static function updatePersonAccountByAccountId($accountId)
    {
        return new UpdatePersonAccountByAccountId($accountId);
    }

    /**
     * 个人账户修改(按照第三方用户ID修改).
     * @param $thirdPartyUserId
     * @return UpdatePersonAccountByThirdId
     */
    public static function updatePersonAccountByThirdId($thirdPartyUserId)
    {
        return new UpdatePersonAccountByThirdId($thirdPartyUserId);
    }
}
