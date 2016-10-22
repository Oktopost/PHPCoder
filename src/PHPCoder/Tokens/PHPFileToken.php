<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Compiler\IStream;


class PHPFileToken extends AbstractToken
{
	/**
	 * @param IStream $stream
	 */
	public function write(IStream $stream)
	{
		$stream
			->writeLine('<?php')
			->newLine();
		
		$this->writeChildren($stream);
	}
}