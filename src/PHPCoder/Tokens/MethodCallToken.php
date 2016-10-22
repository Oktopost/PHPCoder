<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Compiler\IStream;


class MethodCallToken extends AbstractFunctionCallToken
{
	/**
	 * @param IStream $stream
	 */
	protected function writeFunctionReference(IStream $stream)
	{
		$stream->write('$this->' . $this->getFunction()->getName());
	}
}