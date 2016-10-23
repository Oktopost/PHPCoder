<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Compiler\IStream;
use PHPCoder\Tokens\Base\AbstractToken;


class ClassToken extends AbstractToken 
{
	private $name;
	
	/** @var ClassNameReferenceToken[] */
	private $extends = [];
	
	/** @var ClassNameReferenceToken[] */
	private $implements = [];


	/**
	 * @param ClassNameReferenceToken[] $target
	 * @param IStream $stream
	 */
	private function writeClassNames(array $target, IStream $stream)
	{
		$isFirst = false;
			
		foreach ($this->extends as $className)
		{
			if ($isFirst) $isFirst = false;
			else $stream->write(', ');
			
			$className->write($stream);
		}
	}

	
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
	 * @param ClassNameReferenceToken|ClassNameReferenceToken[] $className
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
	 * @param ClassNameReferenceToken|ClassNameReferenceToken[] $interfaceName
	 * @return static
	 */
	public function implement($interfaceName)
	{
		if (is_string($interfaceName))
			return $this->implement([$interfaceName]);
		
		$this->implements = array_merge($this->implements, $interfaceName);
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
			$stream->write(' extends ');
			$this->writeClassNames($this->extends, $stream);
		}
		
		if ($this->implements)
		{
			$stream->write(' implements ');
			$this->writeClassNames($this->implements, $stream);
		}
		
		$stream->writeIndentLine("{");
		$this->writeChildren($stream);
		$stream->writeIndentLine("}");
	}
}