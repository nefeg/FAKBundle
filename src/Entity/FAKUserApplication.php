<?php
/**
 * Created by PhpStorm.
 * User: omni
 * Date: 02.11.2018
 * Time: 23:29
 */

namespace Umbrella\FAKLiteBundle\Entity;

/**
 * Class FAKUserApplication
 *
 * @package Umbrella\FAKLiteBundle
 */
class FAKUserApplication
{
	/**
	 * @var string
	 */
	private $id;

	/**
	 * FAKUserApplication constructor.
	 *
	 * @param string $id
	 */
	public function __construct(string $id){

		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function __invoke() :string{
		return $this->id;
	}
}