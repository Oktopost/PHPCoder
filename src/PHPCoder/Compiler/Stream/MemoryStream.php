<?php
namespace PHPCoder\Compiler\Stream;


class MemoryStream extends AbstractStream
{
	private $text = ''; 

	/**
	 * @param string $string
	 * @return static
	 */
	public function write($string)
	{
		$this->text .= $string;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getText()
	{
		return $this->text;
	}
}