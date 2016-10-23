<?php
namespace PHPCoder\Tokens\Generic;


use PHPCoder\Base\Compiler\IStream;
use PHPCoder\Tokens\Base\AbstractToken;


class NewLineToken extends AbstractToken
{
	public function write(IStream $stream)
	{
		$stream->newLine();
	}
}