<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Compiler\IStream;


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