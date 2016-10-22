<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Token\IToken;
use PHPCoder\Base\Compiler\IStream;


class StatementToken extends AbstractToken
{
	/**
	 * @param IToken[] ...$children
	 */
	public function __construct(IToken ...$children)
	{
		$this->addChild(...$children);
	}


	/**
	 * @param IStream $stream
	 * @return mixed|void
	 */
	public function write(IStream $stream)
	{
		$stream->indent();
		$this->writeChildren($stream);
		$stream->writeLine(';');
	}
}