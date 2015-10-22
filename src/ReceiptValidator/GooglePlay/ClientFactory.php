<?php
namespace ReceiptValidator\GooglePlay;

use ReceiptValidator\GooglePlay\Client\CertificateClient;
use ReceiptValidator\GooglePlay\Client\OAuthClient;
use ReceiptValidator\GooglePlay\Config\CertificateConfig;
use ReceiptValidator\GooglePlay\Config\OAuthConfig;
use ReceiptValidator\RunTimeException;

class ClientFactory
{
    const TYPE_CERTIFICATE = 1;
    const TYPE_OAUTH = 2;

    /**
     * @var ConfigInterface
     */
    protected $config;

    /**
     * ClientFactory constructor.
     * @param $type
     * @throws RunTimeException
     */
    public function __construct($type)
    {
        $this->type = $type;

        switch($type) {
            case self::TYPE_CERTIFICATE:
                $this->config = new CertificateConfig();
                break;

            case self::TYPE_OAUTH:
                $this->config = new OAuthConfig();
                break;

            default:
                throw new RunTimeException('Unknown client interface.');
                break;
        }
    }

    /**
     * @return CertificateClient|OAuthClient
     */
    public function getClient()
    {
        switch($this->type) {
            case self::TYPE_CERTIFICATE:
                return new CertificateClient($this->getConfig());
            break;

            case self::TYPE_OAUTH:
                return new OAuthClient($this->getConfig());
            break;
        }
    }

    /**
     * @return OAuthConfig|CertificateConfig|ConfigInterface
     */
    public function getConfig()
    {
        return $this->config;
    }
}