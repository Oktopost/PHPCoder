<?php
namespace PHPCoder\Base\Token;


interface IFunction extends IToken
{
	/**
	 * @return string
	 */
	public function getName();
}