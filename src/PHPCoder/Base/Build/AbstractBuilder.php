<?php
namespace PHPCoder\Base\Build;


use PHPCoder\Base\Token\IToken;


abstract class AbstractBuilder implements IBuilder
{
	/** @var IBuilder[] */
	private $children = [];


	/**
	 * @param IBuilder $builder
	 * @return static
	 */
	public function addChild(IBuilder $builder)
	{
		$this->children[] = $builder;
		return $this;
	}
	
	
	/**
	 * @param IToken $root
	 * @return IToken
	 */
	public abstract function build(IToken $root);

	
	/**
	 * @return IBuilder[]
	 */
	public function children()
	{
		return $this->children;
	}
}