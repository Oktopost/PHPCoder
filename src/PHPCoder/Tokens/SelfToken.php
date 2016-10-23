<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Compiler\IStream;
use PHPCoder\Tokens\Base\AbstractToken;


class SelfToken extends AbstractToken 
{
	/**
	 * @param IStream $stream
	 */
	public function write(IStream $stream)
	{
		$stream->write('self');
	}
}