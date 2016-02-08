<?php
namespace ReceiptValidator\iTunes;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class LatestReceiptResponse
{
    /**
     * @Type("string")
     */
    protected $raw;

    /**
     * @Type("string")
     */
    protected $signature;

    /**
     * @Type("ReceiptValidator\iTunes\ReceiptResponse")
     * @SerializedName("purchase-info")
     */
    protected $purchaseInfo;

    /**
     * @Type("string")
     */
    protected $environment;

    /**
     * @Type("integer")
     */
    protected $pod;

    /**
     * @Type("string")
     * @SerializedName("signing-status")
     */
    protected $signingStatus;

    /**
     * @return string
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param string $environment
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
    }

    /**
     * @return string
     */
    public function getPod()
    {
        return $this->pod;
    }

    /**
     * @param string $pod
     */
    public function setPod($pod)
    {
        $this->pod = $pod;
    }

    /**
     * @return ReceiptResponse
     */
    public function getPurchaseInfo()
    {
        return $this->purchaseInfo;
    }

    /**
     * @param ReceiptResponse $purchaseInfo
     */
    public function setPurchaseInfo($purchaseInfo)
    {
        $this->purchaseInfo = $purchaseInfo;
    }

    /**
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param string $signature
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
    }

    /**
     * @return string
     */
    public function getSigningStatus()
    {
        return $this->signingStatus;
    }

    /**
     * @param string $signingStatus
     */
    public function setSigningStatus($signingStatus)
    {
        $this->signingStatus = $signingStatus;
    }

    /**
     * @return string
     */
    public function getRaw()
    {
        return $this->raw;
    }

    /**
     * @param string $raw
     */
    public function setRaw($raw)
    {
        $this->raw = $raw;
    }
}