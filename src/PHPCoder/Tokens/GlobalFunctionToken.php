<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Token\IFunction;
use PHPCoder\Base\Compiler\IStream;
use PHPCoder\Tokens\Base\AbstractFunctionToken;


class GlobalFunctionToken extends AbstractFunctionToken implements IFunction
{
	/**
	 * @param IStream $stream
	 */
	public function write(IStream $stream)
	{
		parent::write($stream);
		
		$stream
			->indent()
			->write(' function ')
			->write($this->getName());
		
		$this->writeParams($stream);
		
		$stream->newLine()->writeIndentLine('{');
		$this->writeChildrenIndented($stream);
		$stream->writeIndentLine('}')->newLine();
	}
}