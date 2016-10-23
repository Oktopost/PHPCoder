<?php
namespace PHPCoder\Tokens\Reference;


use PHPCoder\Base\Token\IToken;

class StaticReferenceToken extends AbstractReferenceToken 
{
	/**
	 * @param IToken|null $reference
	 * @param IToken[] $target
	 */
	public function __construct(IToken $reference, IToken ...$target)
	{
		parent::__construct('::', $reference);
	}
}