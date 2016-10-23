<?php
namespace PHPCoder\Tokens\Variables;


use PHPCoder\Tokens\Base\AbstractToken;
use PHPCoder\Tokens\Reference\SelfReferenceToken;


class SelfVariableReferenceToken extends AbstractToken 
{
	private $name;


	/**
	 * @param string $name
	 */
	public function __construct($name)
	{
		$this->addChild(
			new SelfReferenceToken(
				new VariableReferenceToken($name)));
	}
}