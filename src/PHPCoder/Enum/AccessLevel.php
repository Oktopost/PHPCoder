<?php
namespace PHPCoder\Enum;


class AccessLevel
{
	use \Objection\TEnum;
	
	
	CONST PRIVATE_ACCESS	= 'private';
	CONST PROTECTED_ACCESS	= 'protected';
	CONST PUBLIC_ACCESS		= 'public';
}