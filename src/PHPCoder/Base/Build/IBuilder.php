<?php
namespace PHPCoder\Base\Build;


use PHPCoder\Base\Token\IToken;


interface IBuilder
{
	/**
	 * @param IToken $root
	 * @return IToken
	 */
	public function build(IToken $root);
	
	/**
	 * @return IBuilder[]
	 */
	public function children();
}