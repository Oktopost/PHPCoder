<?php
namespace PHPCoder\Tokens\Generic;


use PHPCoder\Base\Compiler\IStream;
use PHPCoder\Base\Token\IToken;
use PHPCoder\Tokens\Base\AbstractToken;


class BracesToken extends AbstractToken
{
	/**
	 * @param IToken[] ...$tokens
	 */
	public function __construct(IToken ...$tokens)
	{
		$this->addChild(...$tokens);
	}


	/**
	 * @param IStream $stream
	 */
	public function write(IStream $stream)
	{
		$stream->write('{');
		parent::write($stream);
		$stream->write('}');
	}
}