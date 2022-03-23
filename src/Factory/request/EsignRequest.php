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
namespace Endness\Factory\request;

use Endness\Helper\HttpHelper;
use Hyperf\Utils\Codec\Json;
use ReflectionClass;

/**
 * 轩辕API请求类父类.
 * @date  2020/11/18 16:33
 */
abstract class EsignRequest
{
    private $reqType;

    private $url;

    public function execute()
    {
        try {
            $reflectionClass = new ReflectionClass($this);
        } catch (\ReflectionException $e) {
        }
        $build = $reflectionClass->getMethod('build');
        $build->invoke($this);
        $paramStr = Json::encode($this);
        if ($paramStr == '[]') {
            $paramStr = '{}';
        }
        return HttpHelper::doCommHttp($this->reqType, $this->url, $paramStr);
    }

    /**
     * @return mixed
     */
    public function getReqType()
    {
        return $this->reqType;
    }

    /**
     * @param mixed $reqType
     */
    public function setReqType($reqType)
    {
        $this->reqType = $reqType;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    abstract public function build();
}
