<?php
namespace PHPCoder\Tokens\Base;


use PHPCoder\Base\Token\IToken;
use PHPCoder\Tokens\Generic\ParenthesesToken;


abstract class AbstractFunctionCallToken extends AbstractToken
{
	/** @var ParenthesesToken */
	private $parentheses;


	/**
	 * @param IToken $function
	 * @param IToken[] $params
	 */
	public function __construct($function = null, IToken ...$params)
	{
		$this->parentheses = new ParenthesesToken(...$params);
		
		$this->addChild(
			$function,
			$this->parentheses
		);
	}


	/**
	 * @return ParenthesesToken
	 */
	public function parentheses()
	{
		return $this->parentheses;
	}
}