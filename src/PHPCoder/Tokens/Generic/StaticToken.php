<?php
namespace PHPCoder\Tokens\Generic;


use PHPCoder\Base\Compiler\IStream;


class StaticToken extends IdentifierToken 
{
	public function __construct()
	{
		parent::__construct('static');
	}
}