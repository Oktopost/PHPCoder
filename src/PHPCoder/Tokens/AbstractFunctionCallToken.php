<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Compiler\IStream;
use PHPCoder\Base\Token\IFunction;


abstract class AbstractFunctionCallToken extends AbstractToken
{
	/** @var IFunction */
	private $function;


	/**
	 * @param IStream $stream
	 */
	protected abstract function writeFunctionReference(IStream $stream);
	

	/**
	 * @param IFunction $function
	 */
	public function __construct(IFunction $function = null)
	{
		$this->function = $function;
	}


	/**
	 * @return IFunction
	 */
	public function getFunction()
	{
		return $this->function;
	}

	/**
	 * @param IFunction $function
	 * @return static
	 */
	public function setFunction($function)
	{
		$this->function = $function;
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