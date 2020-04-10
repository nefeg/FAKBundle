<?php

namespace FAKLiteBundle\Service;

use Psr\Http\Message\ResponseInterface;
use FAKLiteBundle\Entity\FAKUser;
use FAKLiteBundle\Service\Exception\DependencyException;
use FAKLiteBundle\Service\Exception\RequestException;
use FAKLiteBundle\Utility\FAKUserBuilder;

/**
 * Class AccountKitService
 *
 * @package FAKLiteBundle\Service
 */
class AccountKitService
{
	const REQUEST_URL = 'https://graph.accountkit.com';
	const API_VERSION = 'v1.3';

	/**
	 * @var \GuzzleHttp\Client
	 */
	private $Client;

	/**
	 * @var string
	 */
	private $requestUri;
	/**
	 * @var string
	 */
	private $apiVersion;

	/**
	 * AccountKitService constructor.
	 *
	 * @param string $requestUri
	 * @param string $apiVersion
	 * @throws \FAKLiteBundle\Service\Exception\DependencyException
	 */
	public function __construct(string $requestUri = self::REQUEST_URL, string $apiVersion = self::API_VERSION){

		$this->requestUri = $requestUri;
		$this->apiVersion = $apiVersion;

		if (!class_exists('\GuzzleHttp\Client'))
			throw new DependencyException('Class not exist: GuzzleHttp\Client.');

		$this->Client = new \GuzzleHttp\Client(['base_uri' => $this->getUri()]);

	}

	/**
	 * @return \GuzzleHttp\Client
	 */
	protected function getClient() :\GuzzleHttp\Client{
		return $this->Client;
	}

	/**
	 * @return string
	 */
	public function getUri() :string{
		return $this->requestUri;
	}

	/**
	 * @return string
	 */
	public function getApiVersion() :string{
		return $this->apiVersion;
	}

	/**
	 * @param string $accessToken
	 * @return \FAKLiteBundle\Entity\FAKUser|NULL
	 * @throws \FAKLiteBundle\Service\Exception\RequestException
	 * @throws \FAKLiteBundle\Utility\FAKUserBuilder\Exception\MalformedJSONException
	 */
	public function getByAccessToken(string $accessToken) :?FAKUser {

		$User = NULL;

		try {
			$ackResponse = $this->getClient()->get($this->getUri() . '/' . $this->getApiVersion() . '/me/?access_token=' . $accessToken);

			if ($ackResponse->getStatusCode() != 200)
				throw new RequestException('FAK request error: ' . $ackResponse->getStatusCode());


		} catch (\GuzzleHttp\Exception\ClientException $FAKException) {

			$Json = $this->decodeResponse($FAKException->getResponse());

			if (isset($Json['error']['message']))
				throw new RequestException($Json['error']['message']);

			throw new RequestException('Unknown Error.');
		}


		if($Json = $this->decodeResponse($ackResponse)) {
			$User = FAKUserBuilder::buildFromJson($Json);
		}

		return $User;
	}

	/**
	 * @param null|\Psr\Http\Message\ResponseInterface $Response
	 * @return array
	 */
	private function decodeResponse(?ResponseInterface $Response) :array{

		return \GuzzleHttp\json_decode($Response->getBody()->getContents(), true);
	}
}