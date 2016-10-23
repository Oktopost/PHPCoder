<?php
namespace PHPCoder\Tokens\Variables;


use PHPCoder\Base\Compiler\IStream;
use PHPCoder\Tokens\Base\AbstractToken;


class VariableReferenceToken extends AbstractToken 
{
	private $name;


	/**
	 * @param string $name
	 */
	public function __construct($name)
	{
		$this->name = $name;
	}
	

	/**
	 * @param IStream $stream
	 */
	public function write(IStream $stream)
	{
		$stream->write('$' . $this->name);
	}
}