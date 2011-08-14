<?php

/*
PhpWsdl - Generate WSDL from PHP
Copyright (C) 2011  Andreas Zimmermann, wan24.de 

This program is free software; you can redistribute it and/or modify it under 
the terms of the GNU General Public License as published by the Free Software 
Foundation; either version 3 of the License, or (at your option) any later 
version. 

This program is distributed in the hope that it will be useful, but WITHOUT 
ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS 
FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. 

You should have received a copy of the GNU General Public License along with 
this program; if not, see <http://www.gnu.org/licenses/>.
*/

if(basename($_SERVER['SCRIPT_FILENAME'])==basename(__FILE__))
	exit;

/**
 * A parameter or return value definition for a method
 * 
 * @author Andreas Zimmermann, wan24.de
 */
class PhpWsdlParam{
	/**
	 * The parameter name
	 * 
	 * @var string
	 */
	public $Name;
	/**
	 * The parameter type name
	 * 
	 * @var string
	 */
	public $Type;
	
	/**
	 * Constructor
	 * 
	 * @param string $name The name
	 * @param string $type Optional the type name (default: string)
	 * @param array $settings Optional the settings hash array (default: NULL)
	 */
	public function PhpWsdlParam($name,$type='string',$settings=null){
		$this->Name=$name;
		$this->Type=$type;
	}
	
	/**
	 * Create the part WSDL
	 * 
	 * @param PhpWsdl $pw The PhpWsdl object
	 * @return string The WSDL
	 */
	public function CreatePart($pw){
		$res="\t\t".'<wsdl:part name="'.$this->Name.'" type="';
		$res.=(in_array($this->Type,$pw->BasicTypes))?'s':'tns';
		$res.=':'.$this->Type.'" />';
		return $res;
	}
}