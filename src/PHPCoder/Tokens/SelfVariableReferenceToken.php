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
		if (!$this->getVariable())
			throw new \Exception('Variable was not set for VariableReferenceToken!');
		
		$stream->write('self::$' . $this->getVariable()->getName());
	}
}