<?php
namespace PHPCoder\Tokens\Functions;


use PHPCoder\Base\Token\IToken;
use PHPCoder\Base\Compiler\IStream;
use PHPCoder\Tokens\Base\AbstractToken;
use PHPCoder\Tokens\Tokens;
use PHPCoder\Tokens\Generic\IdentifierToken;
use PHPCoder\Tokens\Generic\IndentBracesToken;
use PHPCoder\Tokens\Functions\Params\ParametersSetToken;


class GlobalFunctionToken extends AbstractToken
{
	/** @var */
	private $parametersSet;
	
	/** @var IndentBracesToken */
	private $body;


	/**
	 * GlobalFunctionToken constructor.
	 * @param $name
	 * @param IToken[]|IdentifierToken[]|string[] ...$params
	 */
	public function __construct($name, ...$params)
	{
		$this->body = new IndentBracesToken();
		$this->parametersSet = new ParametersSetToken(...$params);
		
		$this->addChild(
			Tokens::functionKeyWord(),
			Tokens::space(), 
			Tokens::identify($name),
			$this->parametersSet,
			Tokens::newLine(),
			$this->body
		);
	}


	/**
	 * @param IStream $stream
	 */
	public function write(IStream $stream)
	{
		$stream->indent();
		$this->writeChildren($stream);
		$stream->newLine();
	}
}