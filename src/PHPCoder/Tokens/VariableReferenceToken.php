<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Compiler\IStream;


class VariableReferenceToken extends AbstractVariableReferenceToken
{
	/**
	 * @param IStream $stream
	 */
	public function write(IStream $stream)
	{
		$stream->write('$' . $this->getName());
	}
}