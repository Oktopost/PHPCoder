<?php
namespace PHPCoder\Base\Token;


interface IVariable extends IToken
{
	/**
	 * @return string
	 */
	public function getName();
}