<?php

namespace ReceiptValidator\GooglePlay\Client;

use ReceiptValidator\GooglePlay\Client;
use ReceiptValidator\GooglePlay\Config\CertificateConfig;
use ReceiptValidator\RunTimeException;
use \Google_Client;

/**
 * Class CertificateClient.
 */
class CertificateClient extends Client
{
    const ANDROID_PUBLISHER_URI = 'https://www.googleapis.com/auth/androidpublisher';

    /**
     * @var Google_Client
     */
    protected $client;

    /**
     * @param CertificateConfig $config
     *
     * @throws RunTimeException
     */
    public function __construct(CertificateConfig $config)
    {
        $client = new Google_Client();

        $client->setClientId($config->getClientId());
        $client->setAuthConfig($config->getJsonPath());
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
