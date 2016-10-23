<?php
namespace PHPCoder\Tokens\Base;


use PHPCoder\Base\Token\INamed;
use PHPCoder\Base\Token\IVariable;


abstract class AbstractVariableReferenceToken extends AbstractToken implements INamed 
{
	/** @var string */
	private $name;


	/**
	 * @param string|false $name
	 */
	public function __construct($name = null)
	{
		$this->name = $name;
	}


	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param IVariable|string $name
	 * @return static
	 */
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}
}