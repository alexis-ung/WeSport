<?php
	ini_set("display_errors", true);

	Class VuePapa{
		protected $contenu,$titre;

		function __construct(){
			$this->titre="";
			$this->contenu="";
			ob_start();
		}

		function printView(){
			$print_data = array('titre'=>$this->titre,'contenu' => ob_get_clean());
			extract($print_data);
			require_once('VuePapa/template.php');
		}

		function vueConfirmationMessage($message){
			echo "<p>$message</p>";
			self::printView();
		}
	}
?>