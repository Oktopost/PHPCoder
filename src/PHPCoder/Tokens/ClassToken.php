<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Compiler\IStream;


class ClassToken extends AbstractToken 
{
	private $name;
	
	private $extends = [];
	private $implements = [];


	/**
	 * @param string $name
	 */
	public function __construct($name = '')
	{
		$this->name = $name;
	}
	

	/**
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * @param string|array $className
	 * @return static
	 */
	public function extend($className)
	{
		if (is_string($className))
			return $this->extend([$className]);
		
		$this->extends = array_merge($this->extends, $className);
		return $this;
	}

	/**
	 * @param string|array $interfaceName
	 * @return static
	 */
	public function implement($interfaceName)
	{
		if (is_string($interfaceName))
			return $this->implement([$interfaceName]);
		
		$this->implements = array_merge($this->extends, $interfaceName);
		return $this;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}
	
	
	/**
	 * @param IStream $stream
	 * @return mixed
	 */
	public function write(IStream $stream)
	{
		if (!$this->name)
			throw new \Exception('Class name was not set!');
		
		$stream
			->indent()
			->write("class $this->name");
		
		if ($this->extends)
		{
			$stream
				->write(' extends ')
				->writeArray(', ', $this->extends);
		}
		
		if ($this->implements)
		{
			$stream
				->write(' implements ')
				->writeArray(', ', $this->implements);
		}
		
		$stream->writeIndentLine("{");
		$this->writeChildren($stream);
		$stream->writeIndentLine("}");
	}
}