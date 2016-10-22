<?php
namespace PHPCoder\Compiler\Stream;


use PHPCoder\Base\Compiler\IStream;


abstract class AbstractStream implements IStream
{
	private $indents = 0;
	
	
	/**
	 * @param string $string
	 * @return static
	 */
	public abstract function write($string);

	
	/**
	 * @param $glue
	 * @param array $data
	 * @return static
	 */
	public function writeArray($glue, array $data)
	{
		return $this->write(implode($glue, $data));
	}

	/**
	 * @return static
	 */
	public function newLine()
	{
		return $this->write(PHP_EOL);
	}

	/**
	 * @param string $string
	 * @return static
	 */
	public function writeLine($string)
	{
		return $this
			->write($string)
			->newLine();
	}

	/**
	 * @param int $count
	 * @return static
	 */
	public function writeTab($count = 1)
	{
		return $this->write(str_repeat("\t", $count));
	}

	/**
	 * @param int $count
	 * @return static
	 */
	public function addIndent($count = 1)
	{
		$this->indents += $count;
	}

	/**
	 * @param int $count
	 * @return static
	 */
	public function remIndent($count = 1)
	{
		$this->indents -= $count;
		
		if ($this->indents < 0)
			throw new \Exception("Indent can't be set to less then 0!");
	}

	/**
	 * @param int $tabs
	 * @param string $text
	 * @return static
	 */
	public function writeStatementLine($tabs, $text)
	{
		return $this
			->writeTab($tabs)
			->write($text)
			->newLine();
	}
	
	/**
	 * @param string $text
	 * @return static
	 */
	public function writeIndentLine($text)
	{
		return $this->writeStatementLine($this->indents, $text);
	}
	
	/**
	 * @return static
	 */
	public function indent()
	{
		return $this->writeTab($this->indents);
	}
}