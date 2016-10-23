<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Compiler\IStream;
use PHPCoder\Tokens\Base\AbstractFunctionCallToken;


class SelfMethodCallToken extends AbstractFunctionCallToken
{
	/**
	 * @param IStream $stream
	 */
	protected function writeFunctionReference(IStream $stream)
	{
		$stream->write('self::' . $this->getName());
	}
}