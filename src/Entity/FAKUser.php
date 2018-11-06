<?php
/**
 * Created by PhpStorm.
 * User: omni
 * Date: 02.11.2018
 * Time: 23:26
 */

namespace Umbrella\FAKLiteBundle\Entity;

/**
 * Class FAKUser
 *
 * @package Umbrella\FAKLiteBundle
 */
class FAKUser
{
	/**
	 * @var string
	 */
	private $id;

	/**
	 * @var \Umbrella\FAKLiteBundle\Entity\FAKUserPhone
	 */
	private $phone;

	/**
	 * @var \Umbrella\FAKLiteBundle\Entity\FAKUserApplication
	 */
	private $application;

	/**
	 * FAKUser constructor.
	 *
	 * @param string $id
	 */
	public function __construct(string $id){

		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getId(): string {
		return $this->id;
	}

	/**
	 * @return \Umbrella\FAKLiteBundle\Entity\FAKUserPhone
	 */
	public function getPhone(): ?FAKUserPhone {
		return $this->phone;
	}

	/**
	 * @param \Umbrella\FAKLiteBundle\Entity\FAKUserPhone $phone
	 * @return FAKUser
	 */
	public function setPhone(FAKUserPhone $phone) {
		$this->phone = $phone;

		return $this;
	}

	/**
	 * @return \Umbrella\FAKLiteBundle\Entity\FAKUserApplication
	 */
	public function getApplication(): ?FAKUserApplication {
		return $this->application;
	}

	/**
	 * @param \Umbrella\FAKLiteBundle\Entity\FAKUserApplication $application
	 * @return FAKUser
	 */
	public function setApplication(FAKUserApplication $application) {
		$this->application = $application;

		return $this;
	}
}