<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Token\IVariable;
use PHPCoder\Base\Compiler\IStream;


class StaticVariableReferenceToken extends AbstractVariableReferenceToken
{
	/** @var ClassNameReferenceToken */
	private $class;
	
	
	/**
	 * @param ClassNameReferenceToken $class
	 * @param IVariable $variable
	 */
	public function __construct(ClassNameReferenceToken $class, IVariable $variable = null)
	{
		parent::__construct($variable);
	}
	
	
	/**
	 * @param IStream $stream
	 */
	public function write(IStream $stream)
	{
		$stream->write('self::$' . $this->getName());
	}
}