<?php

namespace FAKLiteBundle\Entity;

/**
 * Class FAKUserPhone
 *
 * @package FAKLiteBundle
 */
class FAKUserPhone
{
	/**
	 * @var string
	 */
	private $country_prefix;
	/**
	 * @var string
	 */
	private $national_number;

	/**
	 * FAKUserPhone constructor.
	 *
	 * @param string $country_prefix
	 * @param string $national_number
	 */
	public function __construct(string $country_prefix, string $national_number){

		$this->country_prefix = $country_prefix;
		$this->national_number = $national_number;
	}

	/**
	 * @return string
	 */
	public function __invoke() :string{
		return (string) $this;
	}

	/**
	 * @return string
	 */
	public function __toString() :string{
		return $this->country_prefix . $this->national_number;
	}

	/**
	 * @return string
	 */
	public function getCountryPrefix(): string {
		return $this->country_prefix;
	}

	/**
	 * @return string
	 */
	public function getNationalNumber(): string {
		return $this->national_number;
	}
}