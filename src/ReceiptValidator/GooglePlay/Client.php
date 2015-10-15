<?php
namespace ReceiptValidator\GooglePlay;

/**
 * Class Client
 * @package ReceiptValidator\GooglePlay
 */
class Client implements ClientInterface
{
    /**
     * @var \Google_Client
     */
    protected $client;
    /**
     * @var ConfigInterface
     */
    protected $config;

    /**
     * @param \Google_Client $client
     * @param ConfigInterface $config
     */
    public function __construct(\Google_Client $client, ConfigInterface $config)
    {
        $this->client = $client;
    }

    /**
     * @return \Google_Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param \Google_Client $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return ConfigInterface
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param ConfigInterface $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }
}