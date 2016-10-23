<?php
namespace PHPCoder\Tokens\Functions\Params;


use PHPCoder\Tokens\Base\AbstractToken;
use PHPCoder\Tokens\Tokens;
use PHPCoder\Tokens\Generic\ConstToken;
use PHPCoder\Tokens\Generic\IdentifierToken;


class ParameterDefinitionToken extends AbstractToken
{
	/** @var IdentifierToken */
	private $nameIdentifier;
	
	
	/**
	 * ParameterDefinitionToken constructor.
	 * @param string|IdentifierToken $name
	 * @param string|IdentifierToken|null $type
	 * @param ConstToken|null $defaultValue
	 */
	public function __construct($name, $type = null, $defaultValue = null)
	{
		$this->nameIdentifier = Tokens::identify($name);
		
		if ($type)
		{
			$this->addChild(
				Tokens::identify($type),
				Tokens::space()
			);
		}
		
		$this->addChild(
			Tokens::variable(
				$this->nameIdentifier
			)
		);
				
		if ($defaultValue)
		{
			$this->addChild($defaultValue);
		}
	}


	/**
	 * @return IdentifierToken
	 */
	public function getNameIdentifier()
	{
		return $this->nameIdentifier;
	}
}