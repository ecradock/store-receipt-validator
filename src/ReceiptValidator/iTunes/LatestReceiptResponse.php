<?php
namespace ReceiptValidator\iTunes;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class LatestReceiptResponse
{
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
     * @return mixed
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param mixed $environment
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
    }

    /**
     * @return mixed
     */
    public function getPod()
    {
        return $this->pod;
    }

    /**
     * @param mixed $pod
     */
    public function setPod($pod)
    {
        $this->pod = $pod;
    }

    /**
     * @return mixed
     */
    public function getPurchaseInfo()
    {
        return $this->purchaseInfo;
    }

    /**
     * @param mixed $purchaseInfo
     */
    public function setPurchaseInfo($purchaseInfo)
    {
        $this->purchaseInfo = $purchaseInfo;
    }

    /**
     * @return mixed
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param mixed $signature
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
    }

    /**
     * @return mixed
     */
    public function getSigningStatus()
    {
        return $this->signingStatus;
    }

    /**
     * @param mixed $signingStatus
     */
    public function setSigningStatus($signingStatus)
    {
        $this->signingStatus = $signingStatus;
    }
}