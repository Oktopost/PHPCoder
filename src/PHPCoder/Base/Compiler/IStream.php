<?php
namespace PHPCoder\Base\Compiler;


interface IStream
{
	/**
	 * @param string $string
	 * @return static
	 */
	public function write($string);

	/**
	 * @param $glue
	 * @param array $data
	 * @return static
	 */
	public function writeArray($glue, array $data);

	/**
	 * @param string $string
	 * @return static
	 */
	public function writeLine($string);

	/**
	 * @return static
	 */
	public function newLine();

	/**
	 * @param int $count
	 * @return static
	 */
	public function writeTab($count = 1);

	/**
	 * @param int $count
	 * @return static
	 */
	public function addIndent($count = 1);

	/**
	 * @param int $count
	 * @return static
	 */
	public function remIndent($count = 1);
	
	/**
	 * @param int $tabs
	 * @param string $text
	 * @return static
	 */
	public function writeStatementLine($tabs, $text);
	
	/**
	 * @param string $text
	 * @return static
	 */
	public function writeIndentLine($text);

	/**
	 * @return static
	 */
	public function indent();
}