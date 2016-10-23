<?php
namespace PHPCoder\Tokens;


use PHPCoder\Base\Compiler\IStream;
use PHPCoder\Tokens\Base\AbstractToken;


class ConstToken extends AbstractToken
{
	private $value;


	/**
	 * @param mixed $value
	 */
	public function __construct($value = null)
	{
		$this->setValue($value);
	}


	/**
	 * @return mixed
	 */
	public function getValue()
	{
		return $this->value;
	}
	
	/**
	 * @param mixed $value
	 * @return static
	 */
	public function setValue($value)
	{
		if (is_array($value))
		{
			foreach ($value as $item)
			{
				$this->addChild(new ConstToken($item));
			}
			
			$value = [];
		}
		
		$this->value = $value;
		return $this;
	}

	
	/**
	 * @param IStream $stream
	 */
	public function write(IStream $stream)
	{
		if ($this->value === false)
		{
			$stream->write('false');
		}
		else if ($this->value === true)
		{
			$stream->write('true');
		}
		else if ($this->value === [])
		{
			$isFirst = true;
			$stream->write('[');
			
			foreach ($this->children() as $child)
			{
				if ($isFirst) $isFirst = false;
				else $stream->write(', ');
				
				$child->write($stream);
			}
			
			$stream->write(']');
		}
		else if ($this->value === null)
		{
			$stream->write('null');
		}
		else if (is_string($this->value))
		{
			$stream->write("\"{$this->value}\"");
		}
		// Int/Double.
		else 
		{
			$stream->write($this->value);
		}
	}
}