<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Compiler\IStream;


class DataMemberReferenceToken extends AbstractVariableReferenceToken
{
	/**
	 * @param IStream $stream
	 */
	public function write(IStream $stream)
	{
		if (!$this->getFunction())
			throw new \Exception('Variable was not set for VariableReferenceToken!');
		
		$stream->write('$this->' . $this->getFunction()->getName());
	}
}