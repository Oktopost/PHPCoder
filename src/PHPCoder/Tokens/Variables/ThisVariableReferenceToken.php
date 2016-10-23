<?php
namespace PHPCoder\Tokens\Variables;


use PHPCoder\Tokens\Generic\TextToken;
use PHPCoder\Tokens\Base\AbstractToken;
use PHPCoder\Tokens\Reference\ThisReferenceToken;


class ThisVariableReferenceToken extends AbstractToken 
{
	/**
	 * @param string $name
	 */
	public function __construct($name)
	{
		$this->addChild(
			new ThisReferenceToken(
				new TextToken($name)));
	}
}