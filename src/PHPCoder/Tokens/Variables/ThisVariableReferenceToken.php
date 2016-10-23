<?php
namespace PHPCoder\Tokens\Variables;


use PHPCoder\Tokens\Base\AbstractToken;
use PHPCoder\Tokens\Generic\IdentifierToken;
use PHPCoder\Tokens\Reference\ThisReferenceToken;


class ThisVariableReferenceToken extends AbstractToken 
{
	/**
	 * @param IdentifierToken|string $name
	 */
	public function __construct($name)
	{
		if (!($name instanceof IdentifierToken))
			$name = new IdentifierToken($name);
		
		$this->addChild(
			new ThisReferenceToken(
				new IdentifierToken($name)));
	}
}