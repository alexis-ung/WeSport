<?php
   	define ('CONST_INCLUDE' , NULL ) ;
	session_start();

	require_once("Admin/controleurAdmin.php");
	require_once("Public/controleurPublic.php");

	Class Index{
		
		private $controleur;

		function __construct(){
			$this->switchModule();
		}

		function switchModule(){
			if(isset($_GET['module'])){
				$module=$_GET['module'];
			}
			else
				$module=null;
			switch ($module) {
				case "admin":
					$this->controleur = new ControleurAdmin();
					break;

				default:
					$this->controleur = new ControleurPublic();
					break;
			}
		}
	}
	$index = new Index();
?>