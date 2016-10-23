<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Compiler\IStream;
use PHPCoder\Tokens\Base\AbstractToken;


class ThisToken extends AbstractToken
{
	/**
	 * @param IStream $stream
	 */
	public function write(IStream $stream)
	{
		$stream->write('$this');
	}
}