<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Compiler\IStream;
use PHPCoder\Tokens\Base\AbstractToken;


class ClassNameReferenceToken extends AbstractToken
{
	private $className = false;


	/**
	 * @param string|bool $className
	 */
	public function __construct($className = false)
	{
		$this->className = $className;
	}

	/**
	 * @return bool|string
	 */
	public function getClassName()
	{
		return $this->className;
	}
	
	/**
	 * @param string $className
	 * @return static
	 */
	public function setClassName($className)
	{
		$this->className = $className;
		return $this;
	}
	
	
	/**
	 * @param IStream $stream
	 */
	public function write(IStream $stream)
	{
		if (!$this->className)
			throw new \Exception('Class name must be set');
		
		$stream->write($this->className);
	}
}