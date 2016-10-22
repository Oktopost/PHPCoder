<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Token\IToken;
use PHPCoder\Base\Compiler\IStream;


abstract class AbstractToken implements IToken
{
	/** @var IToken|null */
	private $root;
	
	/** @var IToken[] */
	private $children = [];

	
	/**
	 * @param IStream $stream
	 */
	protected function writeChildrenIndented(IStream $stream)
	{
		$stream->addIndent();
		$this->writeChildren($stream);
		$stream->remIndent();
	}

	/**
	 * @param IStream $stream
	 */
	protected function writeChildren(IStream $stream)
	{
		foreach ($this->children as $child)
		{
			$child->write($stream);
		}
	}
	

	/**
	 * @param IToken[] $child
	 */
	public function addChild(IToken ...$child)
	{
		$this->children = array_merge($this->children, $child);
	}
	
	/**
	 * @param IToken $token
	 */
	public function setRoot(IToken $token = null)
	{
		$this->root = $token;
	}
	
	/**
	 * @return IToken
	 */
	public function root()
	{
		return $this->root();
	}

	/**
	 * @return IToken[]
	 */
	public function children()
	{
		return $this->children;
	}

	/**
	 * @return int
	 */
	public function childrenCount()
	{
		return count($this->children);
	}

	/**
	 * @return bool
	 */
	public function hasChildren()
	{
		return (bool)$this->children;
	}

	/**
	 * @return IToken|null
	 */
	public function firstChild()
	{
		return $this->hasChildren() ? 
			$this->children[0] : 
			null;
	}

	/**
	 * @return IToken|null
	 */
	public function lastChild()
	{
		return $this->hasChildren() ? 
			$this->children[$this->childrenCount() - 1] : 
			null;
	}

	/**
	 * @return bool
	 */
	public function isRoot()
	{
		return (bool)$this->root;
	}

	/**
	 * @param IStream $stream
	 */
	public abstract function write(IStream $stream);
}