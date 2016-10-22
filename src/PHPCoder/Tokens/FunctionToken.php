<?php
namespace PHPCoder\Tokens;


use PHPCoder\Enum\AccessLevel;
use PHPCoder\Base\Compiler\IStream;


class FunctionToken extends AbstractToken
{
	private $accessLevel = AccessLevel::PRIVATE_ACCESS;
	private $name;
	
	/** @var ParameterToken[] */
	private $params = [];
	
	
	private $lastParameterIndex = 0;

	
	/**
	 * @param IStream $stream
	 */
	private function writeParams(IStream $stream)
	{
		$stream->write('(');
		
		foreach ($this->params as $param)
		{
			$param->write($stream);
		}
		
		$stream->write(')');
	}

	/**
	 * @param string $name
	 * @return bool
	 */
	private function hasParameter($name)
	{
		foreach ($this->params as $param)
		{
			if (strtolower($param->getName()) == strtolower($name))
				return true;
		}
		
		return false;
	}
	
	/**
	 * @return string
	 */
	private function getParameterName()
	{
		$name = 'p' . $this->lastParameterIndex++;
		
		while ($this->hasParameter($name))
		{
			$name = 'p' . $this->lastParameterIndex++;
		}
		
		return $name;
	}
	
	private function fillParameterNames()
	{
		foreach ($this->params as $param)
		{
			if (!$param->getName())
			{
				$param->setName($this->getParameterName());
			}
		}
	}
	

	/**
	 * @param string|bool $name
	 * @param string $level
	 * @param ParameterToken[] $params
	 */
	public function __construct($name = false, $level = AccessLevel::PRIVATE_ACCESS, array $params = [])
	{
		$this->name = $name;
		$this->accessLevel = $level;
		$this->params = $params;
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
	 * @return bool|string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param bool|string $name
	 * @return static
	 */
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return ParameterToken[]
	 */
	public function getParams()
	{
		return $this->params;
	}

	/**
	 * @param ParameterToken|ParameterToken[] ...$parameterToken
	 * @return static
	 */
	public function addParam(ParameterToken ...$parameterToken)
	{
		$this->params = array_merge($this->params, $parameterToken);
		return $this;
	}

	
	/**
	 * @param IStream $stream
	 * @return mixed
	 */
	public function write(IStream $stream)
	{
		if (!$this->name)
			throw new \Exception('Function method must be set');
		
		$this->fillParameterNames();
		
		$stream
			->indent()
			->write($this->accessLevel)
			->write(' function ')
			->write($this->name);
		
		$this->writeParams($stream);
		
		$stream->newLine()->writeIndentLine('{');
		$this->writeChildrenIndented($stream);
		$stream->writeIndentLine('}')->newLine();
	}
}