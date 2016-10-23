<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Compiler\IStream;
use PHPCoder\Tokens\Base\AbstractToken;


class CastToken extends AbstractToken
{
	private $target;


	/**
	 * @param string $to
	 */
	public function __construct($to)
	{
		$this->setTarget($to);
	}

	
	/**
	 * @param string $target
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