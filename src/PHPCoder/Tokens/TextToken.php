<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Token\IToken;
use PHPCoder\Base\Compiler\IStream;


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
	 * @param IToken|null $child
	 */
	public function addChild(IToken $child = null)
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