<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Compiler\IStream;


class ReturnStatementToken extends AbstractToken
{
	/**
	 * @param IStream $stream
	 */
	public function write(IStream $stream)
	{
		$stream->write('return ');
		$this->writeChildren($stream);
	}
}