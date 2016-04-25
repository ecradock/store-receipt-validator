<?php
namespace ReceiptValidator\GooglePlay\Client;

use ReceiptValidator\GooglePlay\Client;
use ReceiptValidator\GooglePlay\Config\OAuthConfig;
use ReceiptValidator\RunTimeException;
use \Google_Client;

/**
 * Class OAuth
 * @package ReceiptValidator\GooglePlay\Client
 */
class OAuthClient extends Client
{
    /**
     * @var string
     */
    protected $cachePath;
    /**
     * @var OAuthConfig
     */
    protected $config;
    /**
     * @var Google_Client
     */
    protected $client;

    /**
     * @param OAuthConfig $config
     * @throws RunTimeException
     */
    public function __construct(OAuthConfig $config)
    {
        $this->cachePath = !$config->getAccessTokenCachePath()
        ? sys_get_temp_dir() . '/'
        : $config->getAccessTokenCachePath() . '/';
        $this->cachePath .= $this->generateCacheFilename($config->getClientId());

        $this->config = $config;
        $this->client = $this->createClient($config);

        parent::__construct($this->client, $this->config);
    }

    /**
     * @param OAuthConfig $config
     * @return Google_Client
     * @throws RunTimeException
     */
    public function createClient(OAuthConfig $config)
    {
        $client = new Google_Client();
        $client->setClientId($config->getClientId());
        $client->setClientSecret($config->getClientSecret());

        try {
            $client->setAccessToken(json_decode($this->readCache(), true));
        } catch (\Exception $e) {
            // skip exceptions when the access token is not valid
        }

        try {
            if ($client->isAccessTokenExpired()) {
                $client->refreshToken($config->getRefreshToken());
                $this->writeCache(json_encode($client->getAccessToken()));
            }
        } catch (\Exception $e) {
            throw new RuntimeException('Failed refreshing access token - ' . $e->getMessage());
        }

        return $client;
    }

    /**
     * @param $token
     */
    protected function writeCache($token)
    {
        touch($this->cachePath);
        chmod($this->cachePath, 0770);

        file_put_contents($this->cachePath, $token);
    }

    /**
     * @return string
     */
    protected function readCache()
    {
        return file_get_contents($this->cachePath);
    }

    /**
     * @param $clientId
     * @return string
     */
    protected function generateCacheFilename($clientId)
    {
        return 'googleplay_access_token_' . md5($clientId) . '.txt';
    }
}
