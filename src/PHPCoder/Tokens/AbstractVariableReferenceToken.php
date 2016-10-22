<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Token\IVariable;


abstract class AbstractVariableReferenceToken extends AbstractToken
{
	/** @var IVariable */
	private $variable;


	/**
	 * @param IVariable|null $variable
	 */
	public function __construct(IVariable $variable = null)
	{
		$this->variable = $variable;
	}


	/**
	 * @return IVariable
	 */
	public function getVariable()
	{
		return $this->variable;
	}

	/**
	 * @param IVariable $variable
	 * @return static
	 */
	public function setVariable($variable)
	{
		$this->variable = $variable;
		return $this;
	}
}