<?php
namespace PHPCoder;


use PHPCoder\Base\Token\IToken;
use PHPCoder\Base\Build\IBuilder;
use PHPCoder\Base\Compiler\IStream;


class Coder
{
	/** @var IStream */
	private $stream;
	
	/** @var IToken */
	private $token;
	
	/** @var IBuilder */
	private $builder;
	

	/**
	 * @param IStream $stream
	 * @return static
	 */
	public function setStream(IStream $stream)
	{
		$this->stream = $stream;
		return $this;
	}

	/**
	 * @param IToken $token
	 * @return static
	 */
	public function setToken(IToken $token)
	{
		$this->token = $token;
		return $this;
	}

	/**
	 * @param IBuilder $builder
	 * @return static
	 */
	public function setBuilder(IBuilder $builder)
	{
		$this->builder = $builder;
		return $this;
	}
	
	
	public function compile()
	{
		$buildManager = new BuildManager();
		$buildManager->setRootBuilder($this->builder)
			->setRootToken($this->token)
			->build();
		
		$this->token->write($this->stream);
	}
}