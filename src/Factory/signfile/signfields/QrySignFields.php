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
namespace Endness\Factory\signfile\signfields;

use Endness\Emun\HttpEmun;
use Endness\Factory\request\EsignRequest;

/**
 * 轩辕API查询签署区列表.
 * @date  2020/11/25 10:42
 */
class QrySignFields extends EsignRequest
{
    private $flowId;

    private $accountId;

    private $signfieldIds;

    /**
     * QrySignFields constructor.
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
     * @return QrySignFields
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
     * @return QrySignFields
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSignfieldIds()
    {
        return $this->signfieldIds;
    }

    /**
     * @param mixed $signfieldIds
     * @return QrySignFields
     */
    public function setSignfieldIds($signfieldIds)
    {
        $this->signfieldIds = $signfieldIds;
        return $this;
    }

    public function build()
    {
        $url = '/v1/signflows/' . $this->flowId . '/signfields?';
        if ($this->accountId != null) {
            $url = $url . '&accountId=' . $this->accountId;
        }
        if ($this->signfieldIds != null) {
            $url = $url . '&signfieldIds=' . $this->signfieldIds;
        }
        $this->setUrl($url);
        $this->setReqType(HttpEmun::GET);
    }
}
