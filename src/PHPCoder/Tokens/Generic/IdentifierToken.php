<?php
namespace PHPCoder\Tokens\Generic;


use PHPCoder\Tokens\Generic\TextToken;


/**
 * @package PHPCoder\Tokens\Generic
 */
class IdentifierToken extends TextToken
{
	/**
	 * @param string $name
	 */
	public function __construct($name)
	{
		parent::__construct($name, false);
	}
}