<?php
/**
 * Created by PhpStorm.
 * User: omni
 * Date: 02.11.2018
 * Time: 21:50
 */

namespace Umbrella\FAKLiteBundle\Service;


use Psr\Http\Message\ResponseInterface;
use Umbrella\JCLibPack\JCJson;

/**
 * Class AccountKitService
 *
 * @package App\v1
 */
class AccountKitService
{
	private const REQUEST_URL = 'https://graph.accountkit.com';
	private const API_VERSION = 'v1.3';

	/**
	 * @var \GuzzleHttp\Client
	 */
	private $RestClient;

	/**
	 * AccountKitService constructor.
	 *
	 * @throws \Exception
	 */
	public function __construct(){

		if (!class_exists('\GuzzleHttp\Client'))
			throw new \Exception('Class not exist: GuzzleHttp\Client.');

		$this->RestClient = new \GuzzleHttp\Client(['base_uri' => static::REQUEST_URL]);
	}

	/**
	 * @param string $accessToken
	 * @return \App\v1\FAKUser
	 * @throws \Exception
	 */
	public function getByAccessToken(string $accessToken) :FAKUser {

		$User = NULL;

		try {
			$ackResponse = $this->RestClient->get(static::REQUEST_URL . '/' . static::API_VERSION . '/me/?access_token=' . $accessToken);

			if ($ackResponse->getStatusCode() != 200)
				throw new FAKRequestException('FAK request error: ' . $ackResponse->getStatusCode());


		} catch (\GuzzleHttp\Exception\ClientException $FAKException) {

			$Json = $this->decodeResponse($FAKException->getResponse());

			if (isset($Json['error']['message']))
				throw new FAKRequestException($Json['error']['message']);

			throw new FAKRequestException('Unknown Error.');
		}


		if($Json = $this->decodeResponse($ackResponse)) {
			$User = FAKUserBuilder::buildFromJson($Json);
		}

		return $User;
	}

	/**
	 * @param null|\Psr\Http\Message\ResponseInterface $Response
	 * @return null|\Umbrella\JCLibPack\JCJson
	 */
	private function decodeResponse(?ResponseInterface $Response) :?JCJson{

		return JCJson::tryFactory($Response->getBody()->getContents(), null);
	}
}