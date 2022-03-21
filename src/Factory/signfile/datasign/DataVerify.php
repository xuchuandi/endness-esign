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
namespace Endness\Factory\signfile\datasign;

use Endness\Emun\HttpEmun;
use Endness\Factory\request\EsignRequest;

/**
 * 轩辕API文本签验签.
 * @date  2020/11/24 14:31
 */
class DataVerify extends EsignRequest implements \JsonSerializable
{
    private $data;

    private $signResult;

    /**
     * DataVerify constructor.
     * @param $data
     * @param $signResult
     */
    public function __construct($data, $signResult)
    {
        $this->data = $data;
        $this->signResult = $signResult;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     * @return DataVerify
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSignResult()
    {
        return $this->signResult;
    }

    /**
     * @param mixed $signResult
     * @return DataVerify
     */
    public function setSignResult($signResult)
    {
        $this->signResult = $signResult;
        return $this;
    }

    public function build()
    {
        $this->setUrl('/v1/dataSign/verify');
        $this->setReqType(HttpEmun::POST);
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
