<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Compiler\IStream;
use PHPCoder\Base\Token\IVariable;


class ParameterToken extends AbstractToken implements IVariable
{
	private $name = false;
	private $type = false;
	
	private $defaultValue;


	/**
	 * @param IStream $stream
	 */
	private function writeType(IStream $stream)
	{
		if ($this->type)
			$stream->write($this->type . ' ');
	}

	/**
	 * @param IStream $stream
	 */
	private function writeName(IStream $stream)
	{
		if (!$this->name)
			throw new \Exception('Name must be set!');
		
		$stream->write('$' . $this->name);
	}
	
	private function writeDefaultValue(IStream $stream)
	{
		if (!isset($this->defaultValue))
			return;
		
		$stream->write(' = ');
		
		if ($this->defaultValue === false)
		{
			$stream->write('false');
		}
		else if ($this->defaultValue === true)
		{
			$stream->write('true');
		}
		else if ($this->defaultValue === [])
		{
			$stream->write('[]');
		}
		else if ($this->defaultValue === null)
		{
			$stream->write('null');
		}
		else if (is_string($this->defaultValue))
		{
			$stream->write("'{$this->defaultValue}'");
		}
		// Int/Double.
		else 
		{
			$stream->write($this->defaultValue);
		}
	}
	
	
	/**
	 * @param string|bool $name
	 * @param string|bool $type
	 */
	public function __construct($name = false, $type = false)
	{
		$this->name = $name;
		$this->type = $type;
	}
	
	
	/**
	 * @param mixed $value
	 * @return static
	 */
	public function setDefaultValue($value)
	{
		$this->defaultValue = $value;
		return $this;
	}


	/**
	 * @param mixed $type
	 * @return static
	 */
	public function setType($type)
	{
		$this->type = $type;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getType()
	{
		return $this->type;
	}
	

	/**
	 * @param $name
	 * @return static
	 */
	public function setName($name)
	{
		$this->name = $name;
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
	 * @param IStream $stream
	 * @return mixed
	 */
	public function write(IStream $stream)
	{
		$this->writeType($stream);
		$this->writeName($stream);
		$this->writeDefaultValue($stream);
	}
}