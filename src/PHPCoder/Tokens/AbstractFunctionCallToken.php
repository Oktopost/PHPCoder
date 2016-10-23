<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Compiler\IStream;
use PHPCoder\Base\Token\IFunction;
use PHPCoder\Base\Token\IToken;


abstract class AbstractFunctionCallToken extends AbstractToken
{
	/** @var IFunction|string */
	private $function;


	/**
	 * @param IStream $stream
	 */
	protected abstract function writeFunctionReference(IStream $stream);
	

	/**
	 * @param IFunction|string $function
	 */
	public function __construct($function = null)
	{
		$this->function = $function;
	}


	/**
	 * @return string
	 */
	public function getName()
	{
		return (is_string($this->function) ? $this->function : $this->function->getName());
	}
	
	/**
	 * @param IFunction|string $function
	 * @return static
	 */
	public function setFunction($function)
	{
		$this->function = $function;
		return $this;
	}

	/**
	 * @param IToken $token
	 * @return static
	 */
	public function addParameter(IToken $token)
	{
		$this->addChild($token);
		return $this;
	}
	
	
	public function write(IStream $stream)
	{
		$stream->indent();
		$this->writeFunctionReference($stream);
		$stream->write('(');
		$this->writeChildren($stream);
		$stream->write(')');
	}
}