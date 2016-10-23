<?php
namespace PHPCoder\Tokens\Reference;


use PHPCoder\Base\Token\IToken;
use PHPCoder\Tokens\SelfToken;


class SelfReferenceToken extends StaticReferenceToken  
{
	/**
	 * @param IToken[] $target
	 */
	public function __construct(IToken ...$target)
	{
		parent::__construct(new SelfToken(), ...$target);
	}
}