<?php
namespace PHPCoder\Tokens;


use PHPCoder\Enum\AccessLevel;
use PHPCoder\Base\Token\IFunction;
use PHPCoder\Base\Compiler\IStream;


class MethodToken extends AbstractFunctionToken implements IFunction
{
	private $accessLevel = AccessLevel::PRIVATE_ACCESS;
	
	
	/**
	 * @param string $level
	 * @param string|bool $name
	 * @param ParameterToken[] $params
	 */
	public function __construct($level = AccessLevel::PRIVATE_ACCESS, $name = false, array $params = [])
	{
		parent::__construct($name, $params);
	}

	/**
	 * @return string
	 */
	public function getAccessLevel()
	{
		return $this->accessLevel;
	}

	/**
	 * @param string $accessLevel
	 * @return static
	 */
	public function setAccessLevel($accessLevel)
	{
		$this->accessLevel = $accessLevel;
		return $this;
	}

	
	/**
	 * @param IStream $stream
	 */
	public function write(IStream $stream)
	{
		parent::write($stream);
		
		$stream
			->indent()
			->write($this->accessLevel)
			->write(' function ')
			->write($this->getName());
		
		$this->writeParams($stream);
		
		$stream->newLine()->writeIndentLine('{');
		$this->writeChildrenIndented($stream);
		$stream->writeIndentLine('}')->newLine();
	}
}