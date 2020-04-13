<?php

namespace Aimchat\FAKLiteBundle\Utility;

use Aimchat\FAKLiteBundle\Entity\FAKUser;
use Aimchat\FAKLiteBundle\Entity\FAKUserApplication;
use Aimchat\FAKLiteBundle\Entity\FAKUserPhone;
use Aimchat\FAKLiteBundle\Utility\FAKUserBuilder\Exception\MalformedJSONException;

/**
 * Class FAKUserBuilder
 *
 * @package Aimchat\FAKLiteBundle\Utility
 */
class FAKUserBuilder
{
	/**
	 * @param array $data
	 * @return \Aimchat\FAKLiteBundle\Entity\FAKUser
	 * @throws \Aimchat\FAKLiteBundle\Utility\FAKUserBuilder\Exception\MalformedJSONException
	 */
	static public function buildFromJson(array $data) :FAKUser{

		if (!isset($data['id']))
			throw new MalformedJSONException('FAKUserBuilder: malformed json-response.');

		$User = new FAKUser($data['id']);

		if (isset($data['phone'])){
			$User->setPhone(
				new FAKUserPhone($data['phone']['country_prefix'], $data['phone']['national_number'])
			);
		}

		if (isset($data['application'])){
			$User->setApplication(
				new FAKUserApplication($data['application']['id'])
			);
		}

		return $User;
	}
}