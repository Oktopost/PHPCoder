<?php
namespace PHPCoder\Tokens\Generic;


use PHPCoder\Base\Token\IToken;
use PHPCoder\Base\Compiler\IStream;
use PHPCoder\Tokens\Base\AbstractToken;


class TextToken extends AbstractToken
{
	private $text;
	private $indented;


	/**
	 * @param string $text
	 * @param bool $indented
	 */
	public function __construct($text, $indented = false)
	{
		$this->text = $text;
		$this->indented = $indented;
	}


	/**
	 * @param IToken[] $child
	 * @return static
	 */
	public function addChild(IToken ...$child)
	{
		throw new \Exception('Text token can not have child tokens!');
	}
	

	/**
	 * @param IStream $stream
	 */
	public function write(IStream $stream)
	{
		if ($this->indented)
			$stream->indent();
		
		$stream->write($this->text);
	}
}