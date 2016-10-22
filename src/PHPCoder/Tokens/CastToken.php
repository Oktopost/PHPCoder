<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Compiler\IStream;


class CastToken extends AbstractToken
{
	private $target;


	/**
	 * @param mixed $value
	 */
	public function __construct($to)
	{
		$this->setTarget($value);
	}


	/**
	 * @return mixed
	 */
	public function getTarget()
	{
		return $this->target;
	}
	
	/**
	 * @param mixed $target
	 * @return static
	 */
	public function setTarget($target)
	{
		$this->target = $target;
		return $this;
	}

	
	/**
	 * @param IStream $stream
	 */
	public function write(IStream $stream)
	{
		$stream
			->write('(')
			->write($this->target)
			->write(')(');
		
		$this->writeChildren($stream);
		
		$stream->write(')');
	}
}