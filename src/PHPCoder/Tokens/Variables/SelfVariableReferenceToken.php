<?php
namespace PHPCoder\Tokens\Variables;


use PHPCoder\Tokens\Base\AbstractToken;
use PHPCoder\Tokens\Generic\IdentifierToken;
use PHPCoder\Tokens\Reference\SelfReferenceToken;


class SelfVariableReferenceToken extends AbstractToken 
{
	private $name;


	/**
	 * @param string|IdentifierToken $name
	 */
	public function __construct($name)
	{
		if (!($name instanceof IdentifierToken))
			$name = new IdentifierToken($name);
		
		$this->addChild(
			new SelfReferenceToken(
				new IdentifierToken($name)));
	}
}