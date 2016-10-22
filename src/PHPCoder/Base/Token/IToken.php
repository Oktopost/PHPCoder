<?php
namespace PHPCoder\Base\Token;


use PHPCoder\Base\Compiler\IStream;


interface IToken
{
	/**
	 * @return IToken 
	 */
	public function root();

	/**
	 * @param IToken $token
	 */
	public function setRoot(IToken $token = null);

	/**
	 * @param IToken[] $child
	 */
	public function addChild(IToken ...$child);

	/**
	 * @return IToken[]
	 */
	public function children();

	/**
	 * @return int
	 */
	public function childrenCount();

	/**
	 * @return bool
	 */
	public function hasChildren();

	/**
	 * @return IToken|null
	 */
	public function firstChild();

	/**
	 * @return IToken|null
	 */
	public function lastChild();

	/**
	 * @return bool
	 */
	public function isRoot();

	/**
	 * @param IStream $stream
	 */
	public function write(IStream $stream);
}