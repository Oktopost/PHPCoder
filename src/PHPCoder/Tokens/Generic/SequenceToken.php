<?php
namespace PHPCoder\Tokens\Generic;


use PHPCoder\Base\Token\IToken;
use PHPCoder\Tokens\Base\AbstractToken;


class SequenceToken extends AbstractToken
{
	/** @var TextToken */
	private $glue;


	/**
	 * @param string $glue
	 * @param IToken[] ...$children
	 */
	public function __construct($glue = ', ', IToken ...$children)
	{
		$this->glue = new TextToken($glue);
		$this->addChild(...$children);
	}


	/**
	 * @param IToken[] ...$child
	 * @return static
	 */
	public function addChild(IToken ...$child)
	{
		foreach ($child as $item)
		{
			if ($this->childrenCount() == 0)
			{
				parent::addChild($item);
				continue;
			}
			
			parent::addChild(
				$this->glue,
				$item
			);
		}
		
		return $this;
	}
}