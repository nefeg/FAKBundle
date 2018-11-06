<?php
/**
 * Created by PhpStorm.
 * User: omni
 * Date: 02.11.2018
 * Time: 23:30
 */

namespace Umbrella\FAKLiteBundle\Utility;


use Umbrella\JCLibPack\JCJson;

/**
 * Class FAKUserBuilder
 *
 * @package App\v1
 */
class FAKUserBuilder
{
	/**
	 * @param \Umbrella\JCLibPack\JCJson $Json
	 * @return \App\v1\FAKUser
	 * @throws \Exception
	 */
	static public function buildFromJson(JCJson $Json) :FAKUser{

		if (!$Json->has('id'))
			throw new \Exception('FAKUserBuilder: malformed json-response.');

		$User = new FAKUser($Json->get('id'));

		if ($Json->has('phone')){
			$User->setPhone(
				new FAKUserPhone($Json['phone']['country_prefix'], $Json['phone']['national_number'])
			);
		}

		if ($Json->has('application')){
			$User->setApplication(
				new FAKUserApplication($Json['application']['id'])
			);
		}

		return $User;
	}
}