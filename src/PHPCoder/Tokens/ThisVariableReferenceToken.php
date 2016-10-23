<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Compiler\IStream;


class ThisVariableReferenceToken extends AbstractVariableReferenceToken
{
	/**
	 * @param IStream $stream
	 */
	public function write(IStream $stream)
	{
		$stream->write('$this->' . $this->getName());
	}
}