<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Compiler\IStream;


class SelfVariableReferenceToken extends AbstractVariableReferenceToken
{
	/**
	 * @param IStream $stream
	 */
	public function write(IStream $stream)
	{
		$stream->write('self::$' . $this->getName());
	}
}