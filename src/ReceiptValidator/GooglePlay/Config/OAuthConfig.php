<?php
namespace ReceiptValidator\GooglePlay\Config;

use ReceiptValidator\GooglePlay\ConfigInterface;

/**
 * Class OAuthConfig
 * @package ReceiptValidator\GooglePlay\Config
 */
class OAuthConfig implements ConfigInterface
{
    /**
     * @var string $clientId
     */
    protected $clientId;
    /**
     * @var string $clientSecret
     */
    protected $clientSecret;
    /**
     * @var string $refreshToken
     */
    protected $refreshToken;
    /**
     * @var string $accessTokenCachePath
     */
    protected $accessTokenCachePath;

    /**
     * @param $clientId
     * @param $clientSecret
     * @param $refreshToken
     * @param $accessTokenCachePath
     */
    public function __construct($clientId = '', $clientSecret = '', $refreshToken = '', $accessTokenCachePath = null)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->refreshToken = $refreshToken;
        $this->accessTokenCachePath = $accessTokenCachePath;
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
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * @param string $clientSecret
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;
    }

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @param string $refreshToken
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;
    }

    /**
     * @return string
     */
    public function getAccessTokenCachePath()
    {
        return $this->accessTokenCachePath;
    }

    /**
     * @param string $accessTokenCachePath
     */
    public function setAccessTokenCachePath($accessTokenCachePath)
    {
        $this->accessTokenCachePath = $accessTokenCachePath;
    }
}