<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Token\IToken;


class ReturnStatementToken extends StatementToken 
{
	public function __construct(IToken ...$children)
	{
		parent::__construct(new TextToken('return '), ...$children);
	}
}