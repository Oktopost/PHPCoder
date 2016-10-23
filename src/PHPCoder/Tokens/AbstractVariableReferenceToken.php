<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Token\IVariable;


abstract class AbstractVariableReferenceToken extends AbstractToken
{
	/** @var IVariable|string */
	private $variable;


	/**
	 * @param IVariable|string|null $variable
	 */
	public function __construct($variable = null)
	{
		$this->variable = $variable;
	}


	/**
	 * @return IVariable
	 */
	public function getName()
	{
		return (is_string($this->variable) ? $this->variable : $this->variable->getName());
	}

	/**
	 * @param IVariable|string $variable
	 * @return static
	 */
	public function setVariable($variable)
	{
		$this->variable = $variable;
		return $this;
	}
}