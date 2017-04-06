<?php
	if(!defined('CONST_INCLUDE'))
	die('Acces direct interdit!');
	require_once('ModelePapa/param_connexion.php');
	Class ModelePapa extends ParamsDB{
		static protected $connexion=null;

		function __construct(){	
			if(self::$connexion==null){
				self::$connexion=new PDO(parent::$dns,parent::$id);
			}
		}		
	}
?>