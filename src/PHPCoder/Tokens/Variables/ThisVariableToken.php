<?php
namespace PHPCoder\Tokens\Variables;


use PHPCoder\Tokens\Generic\IdentifierToken;


class ThisVariableToken extends VariableToken
{
	public function __construct()
	{
		parent::__construct(new IdentifierToken('this'));
	}
}