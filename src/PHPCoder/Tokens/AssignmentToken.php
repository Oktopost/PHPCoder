<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Token\IVariable;
use PHPCoder\Base\Compiler\IStream;
use PHPCoder\Tokens\Base\AbstractToken;


class AssignmentToken extends AbstractToken
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
	 * @return AssignmentToken
	 */
	public function setVariable($variable)
	{
		$this->variable = $variable;
		return $this;
	}


	/**
	 * @param IStream $stream
	 */
	public function write(IStream $stream)
	{
		if (!$this->variable)
			throw new \Exception('Target variable was not set!');
		
		if ($this->childrenCount() == 0)
			throw new \Exception('Assignment must have at least one child!');
		
		$stream->indent();
		$this->variable->write($stream);
		$stream->write(' = ');
		$this->writeChildren($stream);
		$stream->write(';');
	}
}