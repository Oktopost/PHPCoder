<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Compiler\IStream;
use PHPCoder\Tokens\Base\AbstractFunctionCallToken;


class GlobalFunctionCallToken extends AbstractFunctionCallToken
{
	/**
	 * @param IStream $stream
	 */
	protected function writeFunctionReference(IStream $stream)
	{
		$stream->write($this->getFunction()->getName());
	}
}