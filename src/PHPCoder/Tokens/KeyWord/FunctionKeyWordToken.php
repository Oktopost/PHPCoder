<?php
namespace PHPCoder\Tokens\KeyWord;


use PHPCoder\Tokens\Generic\TextToken;


class FunctionKeyWordToken extends TextToken
{
	public function __construct()
	{
		parent::__construct('function', false);
	}
}