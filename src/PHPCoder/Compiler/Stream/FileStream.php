<?php
namespace PHPCoder\Compiler\Stream;


class FileStream extends AbstractStream
{
	private $filePath;


	/**
	 * @param string $filePath
	 */
	public function __construct($filePath)
	{
		$this->filePath = $filePath;
	}


	/**
	 * @param string $string
	 * @return static
	 */
	public function write($string)
	{
		$h = fopen($this->filePath, 'a');
		
		if (!$h)
			throw new \Exception('Failed to open file for writing: ' . $this->filePath);
		
		fwrite($h, $string);
		fflush($h);
		fclose($h);
		
		return $this;
	}
}