<?php
namespace ReceiptValidator\GooglePlay;

use ReceiptValidator\RunTimeException;

/**
 * Class Client
 * @package ReceiptValidator\GooglePlay
 */
class Client
{
	/**
	 * @var \Google_Client
	 */
	private $client;

	/**
	 * @param Config $config
	 * @throws RunTimeException
	 */
	function __construct(Config $config)
	{
		if(!file_exists($config->getCertPath()) || !is_readable($config->getCertPath()))
		{
			throw new RunTimeException('Invalid path provided for certificate');
		}

		$certKey = file_get_contents($config->getCertPath());

		$auth = new \Google_Auth_AssertionCredentials(
			$config->getServiceAccountName(),
			array('https://www.googleapis.com/auth/androidpublisher'),
			$certKey
		);
		$auth->sub = $config->getServiceEmail();

		$client = new \Google_Client();
		$client->setClientId($config->getClientId());
		$client->setAssertionCredentials($auth);
		$client->setAccessType('offline');

		$this->client = $client;
		$this->config = $config;
	}

	/**
	 * @return \Google_Client
	 */
	public function getClient()
	{
		return $this->client;
	}

	/**
	 * @return Config
	 */
	public function getConfig()
	{
		return $this->config;
	}
}
