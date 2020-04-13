<?php

namespace Aimchat\FAKLiteBundle\Entity;

/**
 * Class FAKUser
 *
 * @package Aimchat\FAKLiteBundle
 */
class FAKUser
{
	/**
	 * @var string
	 */
	private $id;

	/**
	 * @var \Aimchat\FAKLiteBundle\Entity\FAKUserPhone
	 */
	private $phone;

	/**
	 * @var \Aimchat\FAKLiteBundle\Entity\FAKUserApplication
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
	 * @return \Aimchat\FAKLiteBundle\Entity\FAKUserPhone
	 */
	public function getPhone(): ?FAKUserPhone {
		return $this->phone;
	}

	/**
	 * @param \Aimchat\FAKLiteBundle\Entity\FAKUserPhone $phone
	 * @return FAKUser
	 */
	public function setPhone(FAKUserPhone $phone) {
		$this->phone = $phone;

		return $this;
	}

	/**
	 * @return \Aimchat\FAKLiteBundle\Entity\FAKUserApplication
	 */
	public function getApplication(): ?FAKUserApplication {
		return $this->application;
	}

	/**
	 * @param \Aimchat\FAKLiteBundle\Entity\FAKUserApplication $application
	 * @return FAKUser
	 */
	public function setApplication(FAKUserApplication $application) {
		$this->application = $application;

		return $this;
	}
}