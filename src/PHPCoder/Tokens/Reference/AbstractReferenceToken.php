<?php
namespace PHPCoder\Tokens\Reference;


use PHPCoder\Base\Token\IToken;
use PHPCoder\Base\Compiler\IStream;
use PHPCoder\Tokens\Base\AbstractToken;
use PHPCoder\Tokens\TextToken;


abstract class AbstractReferenceToken extends AbstractToken 
{
	private $referenceSign;
	
	/** @var  IToken|null */
	private $reference;
	

	/**
	 * @param string $referenceSign
	 * @param IToken|null $reference
	 */
	public function __construct($referenceSign, IToken $reference)
	{
		$this
			->addChild($reference)
			->addChild(new TextToken($referenceSign));
	}
	
	
	/**
	 * @param IStream $stream
	 */
	public function write(IStream $stream)
	{
		if (!$this->reference)
			throw new \Exception('Reference must be set!');
		
		$this->reference->write($stream);
		$stream->write($this->referenceSign);
		$this->writeChildren($stream);
	}
}