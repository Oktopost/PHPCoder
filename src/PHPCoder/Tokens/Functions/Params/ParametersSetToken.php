<?php
namespace PHPCoder\Tokens\Functions\Params;


use PHPCoder\Base\Token\IToken;
use PHPCoder\Tokens\Base\AbstractToken;
use PHPCoder\Tokens\Tokens;
use PHPCoder\Tokens\Generic\IdentifierToken;
use PHPCoder\Tokens\Generic\SequenceToken;


class ParametersSetToken extends AbstractToken
{
	/** @var SequenceToken */
	private $definitionSequence;
	
	/** @var IdentifierToken[] */
	private $identifiers = [];
	
	
	/**
	 * @param IToken[]|string[] ...$set
	 */
	public function __construct(...$set)
	{
		$this->definitionSequence = Tokens::sequence(', ');
		
		$this->addChild(
			Tokens::parentheses(
				$this->definitionSequence));
		
		$this->addParameters(...$set);
	}


	/**
	 * @param string[]|ParameterDefinitionToken[]|IdentifierToken[] ...$params
	 * @return static
	 */
	public function addParameters(...$params)
	{
		foreach ($params as $param)
		{
			if (is_string($param) || $param instanceof IdentifierToken)
			{
				$param = Tokens::identify($param);
				$this->identifiers[] = $param;
				
				$this->definitionSequence->addChild(new ParameterDefinitionToken($param));
			}
			else if ($param instanceof ParameterDefinitionToken)
			{
				$this->identifiers[] = $param->getNameIdentifier();
				$this->definitionSequence->addChild($param);
			}
			else
			{
				throw new \Exception('Child must be of type : ' . ParameterDefinitionToken::class . '!');
			}
		}
		
		return $this;
	}
}