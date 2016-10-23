<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Token\IToken;
use PHPCoder\Tokens\KeyWord;
use PHPCoder\Tokens\Generic;
use PHPCoder\Tokens\Variables\VariableToken;


class Tokens
{
	/**
	 * @return Generic\SpaceToken
	 */
	public static function space()
	{
		return new Generic\SpaceToken();
	}
	
	/**
	 * @return Generic\TextToken
	 */
	public static function text($text)
	{
		return new Generic\TextToken($text);
	}

	/**
	 * @param Generic\IdentifierToken|string $value
	 * @return Generic\IdentifierToken
	 */
	public static function identify($value)
	{
		return Generic\IdentifierToken::identify($value);
	}

	/**
	 * @param IToken[] ...$children
	 * @return Generic\ParenthesesToken
	 */
	public static function parentheses(IToken ...$children)
	{
		return new Generic\ParenthesesToken(...$children);
	}
	
	/**
	 * @param string $glue
	 * @param IToken[] ...$children
	 * @return Generic\SequenceToken
	 */
	public static function sequence($glue = ', ', IToken ...$children)
	{
		return new Generic\SequenceToken($glue, ...$children);
	}

	/**
	 * @param string $name
	 * @return VariableToken
	 */
	public static function variable($name)
	{
		return new VariableToken($name);
	}
	
	/**
	 * @return KeyWord\FunctionKeyWordToken
	 */
	public static function functionKeyWord()
	{
		return new KeyWord\FunctionKeyWordToken();
	}

	/**
	 * @return Generic\NewLineToken
	 */
	public static function newLine()
	{
		return new Generic\NewLineToken();
	}
}