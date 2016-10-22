<?php
namespace PHPCoder;


use PHPCoder\Base\Build\IBuilder;
use PHPCoder\Base\Token\IToken;


class BuildManager
{
	/** @var IBuilder */
	private $rootBuilder = null;
	
	/** @var IToken */
	private $rootToken = null;


	/**
	 * @param IBuilder $parent
	 * @param IToken $parentsToken
	 */
	private function buildChildren(IBuilder $parent, IToken $parentsToken)
	{
		foreach ($parent->children() as $child)
		{
			$this->buildOne($child, $parentsToken);
		}
	}

	/**
	 * @param IBuilder $builder
	 * @param IToken $token
	 */
	private function buildOne(IBuilder $builder, IToken $token)
	{
		$childToken = $builder->build($token);
		$this->buildChildren($builder, $childToken);
	}
	
	
	/**
	 * @param IBuilder $rootBuilder
	 * @return static
	 */
	public function setRootBuilder(IBuilder $rootBuilder)
	{
		$this->rootBuilder = $rootBuilder;
		return $this;
	}

	/**
	 * @param IToken $rootToken
	 * @return static
	 */
	public function setRootToken(IToken $rootToken)
	{
		$this->rootToken = $rootToken;
		return $this;
	}

	
	public function build()
	{
		$this->buildOne($this->rootBuilder, $this->rootToken);
	}
}