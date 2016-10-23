<?php
namespace PHPCoder\Tokens\FunctionCall;


use PHPCoder\Base\Token\IToken;
use PHPCoder\Tokens\Base\AbstractFunctionCallToken;
use PHPCoder\Tokens\Generic\IdentifierToken;
use PHPCoder\Tokens\Reference\ThisReferenceToken;


class ThisFunctionCallToken extends AbstractFunctionCallToken
{
	/**
	 * @param string $name
	 * @param IToken[] ...$params
	 */
	public function __construct($name, IToken ...$params)
	{
		parent::__construct(
			new ThisReferenceToken(new IdentifierToken($name)), 
			$params);
	}
}