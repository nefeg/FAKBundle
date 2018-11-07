<?php
/**
 * Created by PhpStorm.
 * User: omni
 * Date: 02.11.2018
 * Time: 23:30
 */

namespace Umbrella\FAKLiteBundle\Utility;


use Umbrella\FAKLiteBundle\Entity\FAKUser;
use Umbrella\FAKLiteBundle\Entity\FAKUserApplication;
use Umbrella\FAKLiteBundle\Entity\FAKUserPhone;

/**
 * Class FAKUserBuilder
 *
 * @package Umbrella\FAKLiteBundle\Utility
 */
class FAKUserBuilder
{
	/**
	 * @param array $data
	 * @return \Umbrella\FAKLiteBundle\Entity\FAKUser
	 * @throws \Exception
	 */
	static public function buildFromJson(array $data) :FAKUser{

		if (!isset($data['id']))
			throw new \Exception('FAKUserBuilder: malformed json-response.');

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