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
namespace Endness\Factory\signfile;

use Endness\Emun\HttpEmun;
use Endness\Factory\request\EsignRequest;

/**
 * 轩辕API一步发起签署.
 * @date  2020/11/24 9:53
 */
class CreateFlowOneStep extends EsignRequest implements \JsonSerializable
{
    private $attachments;

    private $copiers;

    private $docs;

    private $flowInfo;

    private $signers;

    /**
     * CreateFlowOneStep constructor.
     * @param $docs
     * @param $flowInfo
     * @param $signers
     */
    public function __construct($docs, $flowInfo, $signers)
    {
        $this->docs = $docs;
        $this->flowInfo = $flowInfo;
        $this->signers = $signers;
    }

    /**
     * @return mixed
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * @param mixed $attachments
     * @return CreateFlowOneStep
     */
    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCopiers()
    {
        return $this->copiers;
    }

    /**
     * @param mixed $copiers
     * @return CreateFlowOneStep
     */
    public function setCopiers($copiers)
    {
        $this->copiers = $copiers;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDocs()
    {
        return $this->docs;
    }

    /**
     * @param mixed $docs
     * @return CreateFlowOneStep
     */
    public function setDoc($docs)
    {
        $this->docs = $docs;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFlowInfo()
    {
        return $this->flowInfo;
    }

    /**
     * @param mixed $flowInfo
     * @return CreateFlowOneStep
     */
    public function setFlowInfo($flowInfo)
    {
        $this->flowInfo = $flowInfo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSigners()
    {
        return $this->signers;
    }

    /**
     * @param mixed $signers
     * @return CreateFlowOneStep
     */
    public function setSigners($signers)
    {
        $this->signers = $signers;
        return $this;
    }

    public function build()
    {
        $this->setUrl('/api/v2/signflows/createFlowOneStep');
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
