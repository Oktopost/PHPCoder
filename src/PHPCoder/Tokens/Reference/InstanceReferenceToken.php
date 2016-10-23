<?php
namespace PHPCoder\Tokens\Reference;


use PHPCoder\Base\Token\IToken;

class InstanceReferenceToken extends AbstractReferenceToken 
{
	/**
	 * @param IToken|null $reference
	 */
	public function __construct(IToken $reference)
	{
		parent::__construct('->', $reference);
	}
}