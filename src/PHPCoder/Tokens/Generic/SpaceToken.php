<?php
namespace PHPCoder\Tokens\Generic;


class SpaceToken extends TextToken
{
	public function __construct()
	{
		parent::__construct(' ', false);
	}
}