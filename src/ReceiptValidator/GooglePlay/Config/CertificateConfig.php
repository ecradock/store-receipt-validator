<?php

namespace ReceiptValidator\GooglePlay\Config;

use ReceiptValidator\GooglePlay\ConfigInterface;

/**
 * Class CertificateConfig.
 */
class CertificateConfig implements ConfigInterface
{
    /**
     * @var string
     */
    protected $clientId;
    /**
     * @var string
     */
    protected $serviceAccountName;
    /**
     * @var string
     */
    protected $serviceEmail;
    /**
     * @var string
     */
    protected $jsonPath;

    /**
     * @param $clientId
     * @param $serviceAccountName
     * @param $serviceEmail
     * @param $jsonPath
     */
    public function __construct($clientId = '', $serviceAccountName = '', $serviceEmail = '', $jsonPath = '')
    {
        $this->clientId = $clientId;
        $this->serviceAccountName = $serviceAccountName;
        $this->serviceEmail = $serviceEmail;
        $this->jsonPath = $jsonPath;
    }

    /**
     * @return string
     */
    public function getJsonPath()
    {
        return $this->jsonPath;
    }

    /**
     * @param string $jsonPath
     */
    public function setJsonPath($jsonPath)
    {
        $this->jsonPath = $jsonPath;
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * @return string
     */
    public function getServiceAccountName()
    {
        return $this->serviceAccountName;
    }

    /**
     * @param string $serviceAccountName
     */
    public function setServiceAccountName($serviceAccountName)
    {
        $this->serviceAccountName = $serviceAccountName;
    }

    /**
     * @return string
     */
    public function getServiceEmail()
    {
        return $this->serviceEmail;
    }

    /**
     * @param string $serviceEmail
     */
    public function setServiceEmail($serviceEmail)
    {
        $this->serviceEmail = $serviceEmail;
    }
}
