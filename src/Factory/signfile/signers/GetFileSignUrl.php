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
 * 轩辕API获取签署地址
 * @date  2020/11/24 14:49
 */
class GetFileSignUrl extends EsignRequest
{
    private $flowId;

    private $accountId;

    private $organizeId;

    private $urlType;

    private $appScheme;

    private $params = [];

    /**
     * GetFileSignUrl constructor.
     * @param $flowId
     * @param $accountId
     * @param $params
     */
    public function __construct($flowId, $accountId, $params = [])
    {
        $this->flowId = $flowId;
        $this->accountId = $accountId;
        ! empty($params) && $this->params = $this->paramsHandel($params);
    }

    public function setParams($params)
    {
        ! empty($params) && $this->params = $this->paramsHandel($params);
        return $this;
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
     * @return GetFileSignUrl
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
     * @return GetFileSignUrl
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrganizeId()
    {
        return $this->organizeId;
    }

    /**
     * @param mixed $organizeId
     * @return GetFileSignUrl
     */
    public function setOrganizeId($organizeId)
    {
        $this->organizeId = $organizeId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrlType()
    {
        return $this->urlType;
    }

    /**
     * @param mixed $urlType
     * @return GetFileSignUrl
     */
    public function setUrlType($urlType)
    {
        $this->urlType = $urlType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAppScheme()
    {
        return $this->appScheme;
    }

    /**
     * @param mixed $appScheme
     * @return GetFileSignUrl
     */
    public function setAppScheme($appScheme)
    {
        $this->appScheme = $appScheme;
        return $this;
    }

    public function build()
    {
        $url = '/v1/signflows/' . $this->flowId . '/executeUrl?accountId=' . $this->accountId;
        if ($this->organizeId !== null) {
            $url = $url . '&organizeId=' . $this->organizeId;
        }
        if ($this->urlType !== null) {
            $url = $url . '&urlType=' . $this->urlType;
        }
        if ($this->appScheme !== null) {
            $url = $url . '&appScheme=' . $this->appScheme;
        }
        if (! empty($this->params) && empty($this->organizeId) && empty($this->urlType) && empty($this->appScheme)) {
            $url = $url . '&' . http_build_query($this->params);
        }
        $this->setUrl($url);
        $this->setReqType(HttpEmun::GET);
    }

    private function paramsHandel($params)
    {
        $accessParams = ['organizeId', 'urlType', 'appScheme', 'clientType'];
        if (is_array($params) && ! empty($params)) {
            foreach ($params as $param => $value) {
                if (! in_array($param, $accessParams)) {
                    unset($params[$param]);
                }
            }
            return $params;
        }
    }
}
