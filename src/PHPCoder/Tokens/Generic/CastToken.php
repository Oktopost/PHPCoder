<?php
namespace PHPCoder\Tokens\Generic;


use PHPCoder\Base\Token\IToken;
use PHPCoder\Tokens\Base\AbstractToken;


class CastToken extends AbstractToken
{
	private $parentheses;


	/**
	 * @param string $to
	 * @param IToken[] $data
	 */
	public function __construct($to, IToken ...$data)
	{
		$this->parentheses = new ParenthesesToken(...$data);
		
		$this->addChild(
			new ParenthesesToken(new TextToken($to)),
			$this->parentheses);
	}


	/**
	 * @return ParenthesesToken
	 */
	public function parentheses()
	{
		return $this->parentheses;
	}
}