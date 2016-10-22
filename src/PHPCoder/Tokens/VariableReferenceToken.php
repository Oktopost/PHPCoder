<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Compiler\IStream;
use PHPCoder\Base\Token\IVariable;


class VariableReferenceToken extends AbstractVariableReferenceToken
{
	/**
	 * @param IStream $stream
	 * @return mixed
	 */
	public function write(IStream $stream)
	{
		if (!$this->getVariable())
			throw new \Exception('Variable was not set for VariableReferenceToken!');
		
		$stream->write('$' . $this->getVariable()->getName());
	}
}