<?php

namespace FAKLiteBundle\Utility;

use FAKLiteBundle\Entity\FAKUser;
use FAKLiteBundle\Entity\FAKUserApplication;
use FAKLiteBundle\Entity\FAKUserPhone;
use FAKLiteBundle\Utility\FAKUserBuilder\Exception\MalformedJSONException;

/**
 * Class FAKUserBuilder
 *
 * @package FAKLiteBundle\Utility
 */
class FAKUserBuilder
{
	/**
	 * @param array $data
	 * @return \FAKLiteBundle\Entity\FAKUser
	 * @throws \FAKLiteBundle\Utility\FAKUserBuilder\Exception\MalformedJSONException
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