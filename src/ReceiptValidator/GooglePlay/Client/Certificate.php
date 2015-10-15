<?php

namespace ReceiptValidator\GooglePlay\Client;

use ReceiptValidator\GooglePlay\Client;
use ReceiptValidator\GooglePlay\Config\Certificate as CertificateConfig;
use ReceiptValidator\RunTimeException;

/**
 * Class Certificate.
 */
class Certificate extends Client
{
    const ANDROID_PUBLISHER_URI = 'https://www.googleapis.com/auth/androidpublisher';

    /**
     * @var \Google_Client
     */
    protected $client;

    /**
     * @param CertificateConfig $config
     *
     * @throws RunTimeException
     */
    public function __construct(CertificateConfig $config)
    {
        $auth = new \Google_Auth_AssertionCredentials(
            $config->getServiceAccountName(),
            array(self::ANDROID_PUBLISHER_URI),
            $this->getCertificateKey($config->getCertPath())
        );
        $auth->sub = $config->getServiceEmail();

        $client = new \Google_Client();
        $client->setClientId($config->getClientId());
        $client->setAssertionCredentials($auth);
        $client->setAccessType('offline');

        $this->client = $client;
        $this->config = $config;

        parent::__construct($client, $config);
    }

    /**
     * @param string $certificatePath
     * @return string
     * @throws RunTimeException
     */
    protected function getCertificateKey($certificatePath)
    {
        if (!file_exists($certificatePath) || !is_readable($certificatePath)) {
            throw new RunTimeException('Invalid path provided for certificate');
        }

        return file_get_contents($certificatePath);
    }
}