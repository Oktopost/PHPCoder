<?php
namespace PHPCoder\Tokens\FunctionCall;


use PHPCoder\Base\Token\IToken;
use PHPCoder\Tokens\Base\AbstractFunctionCallToken;
use PHPCoder\Tokens\Generic\IdentifierToken;


class GlobalFunctionCallToken extends AbstractFunctionCallToken
{
	/**
	 * @param string $name
	 * @param IToken[] ...$params
	 */
	public function __construct($name, IToken ...$params)
	{
		parent::__construct(new IdentifierToken($name), $params);
	}
}