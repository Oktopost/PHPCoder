<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Compiler\IStream;


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