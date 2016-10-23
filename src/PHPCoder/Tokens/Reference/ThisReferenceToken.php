<?php
namespace PHPCoder\Tokens\Reference;


use PHPCoder\Base\Token\IToken;
use PHPCoder\Tokens\Generic\ThisToken;


class ThisReferenceToken extends AbstractReferenceToken 
{
	/**
	 * @param IToken[] ...$target
	 */
	public function __construct(IToken ...$target)
	{
		parent::__construct('->', new ThisToken());
		$this->addChild(...$target);
	}
}