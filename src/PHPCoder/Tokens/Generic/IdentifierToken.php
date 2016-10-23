<?php
namespace PHPCoder\Tokens\Generic;


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
	
	
	/**
	 * @param IdentifierToken|string $value
	 * @return IdentifierToken
	 */
	public static function identify($value)
	{
		if (!($value instanceof IdentifierToken))
			return new IdentifierToken($value);
		
		return $value;
	}
}