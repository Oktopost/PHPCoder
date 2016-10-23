<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Token\IFunction;
use PHPCoder\Base\Compiler\IStream;


class StaticMethodCallToken extends AbstractFunctionCallToken
{
	/** @var ClassNameReferenceToken */
	private $class;
	
	
	/**
	 * @param ClassNameReferenceToken $class
	 * @param IFunction $function
	 */
	public function __construct(ClassNameReferenceToken $class, IFunction $function = null)
	{
		parent::__construct($function);
	}
	
	
	/**
	 * @param IStream $stream
	 */
	protected function writeFunctionReference(IStream $stream)
	{
		$this->class->write($stream);
		$stream->write('::' . $this->getName());
	}
}