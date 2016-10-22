<?php
namespace PHPCoder\Tokens;


use PHPCoder\Enum\AccessLevel;
use PHPCoder\Base\Token\IFunction;
use PHPCoder\Base\Compiler\IStream;


abstract class AbstractFunctionToken extends AbstractToken implements IFunction
{
	private $name;
	
	/** @var ParameterToken[] */
	private $params = [];
	
	
	private $lastParameterIndex = 0;


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
	 * @param IStream $stream
	 */
	protected function writeParams(IStream $stream)
	{
		$this->fillParameterNames();
		
		$stream->write('(');
		
		foreach ($this->params as $param)
		{
			$param->write($stream);
		}
		
		$stream->write(')');
	}
	

	/**
	 * @param string|bool $name
	 * @param ParameterToken[] $params
	 */
	public function __construct($name = false, array $params = [])
	{
		$this->name = $name;
		$this->params = $params;
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
	
	public function write(IStream $stream)
	{
		if (!$this->getName())
			throw new \Exception('Function method must be set');

		$this->fillParameterNames();
	}
}