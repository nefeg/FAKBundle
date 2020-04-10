<?php

namespace FAKLiteBundle\Entity;

/**
 * Class FAKUserApplication
 *
 * @package FAKLiteBundle
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