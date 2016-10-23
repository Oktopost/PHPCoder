<?php
namespace PHPCoder\Tokens\FunctionCall;


use PHPCoder\Base\Token\IToken;
use PHPCoder\Tokens\Base\AbstractFunctionCallToken;
use PHPCoder\Tokens\Generic\IdentifierToken;
use PHPCoder\Tokens\Reference\SelfReferenceToken;


class SelfFunctionCallToken extends AbstractFunctionCallToken
{
	/**
	 * @param string $name
	 * @param IToken[] ...$params
	 */
	public function __construct($name, IToken ...$params)
	{
		parent::__construct(
			new SelfReferenceToken(new IdentifierToken($name)), 
			$params);
	}
}