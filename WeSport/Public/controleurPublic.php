<?php
if(!defined('CONST_INCLUDE'))
die('Acces direct interdit!');

require_once('Public/modelePublic.php');
require_once('Public/vuePublic.php');

class ControleurPublic {

	private $modele;
	private $vue;

	function __construct(){
		$this->modele = new ModelePublic();
		$this->vue = new VuePublic();
		self::selectionPagePublic();
	}

	// fonction accueil

	function accueilPublic(){
		$this->vue->accueilPublic();
	}

	// Switch action 

	function selectionPagePublic(){
		if(isset($_GET['action'])){
			$action = $_GET['action'];	
		}
		else {
			$action = "";
		}
		
		switch ($action) {
			case 'rechercheEtablissementForm':
				self::rechercheEtablissementForm();
			break;
			case 'rechercheEtablissement':
				self::rechercheEtablissement();
			break;
			case 'noterEtablissementForm':
				self::noterEtablissementForm();
			break;
			case 'noterEtablissement':
				self::noterEtablissement();
				self::accueilPublic();
			break;
			case 'rechercheUserForm':
				self::rechercheUserForm();
			break;
			case 'rechercheUser':
				self::rechercheUser();
			break;
			case 'noterUserForm':
				self::noterUserForm();
			break;
			case 'noterUser':
				self::noterUser();
				self::accueilPublic();
			break;
			default:
				self::accueilPublic();	
			break;
		}
	}

	function rechercheEtablissementForm(){
		$this->vue->rechercheEtablissementForm($this->modele->listeDepartement(), $this->modele->listeSport(), $this->modele->listeEtablissement());
	}

	function rechercheEtablissement(){
		$requete = ' where';
		if(isset($_POST['sport'])){
			$sport = $_POST['sport'];	
			if($sport != 'default'){
				$requete = $requete . " dispense.intitule = '$sport'";
			}	
			else{
				$requete = $requete . " 1=1";
			}
		}
		if(isset($_POST['etablissement'])){
			$etablissement = $_POST['etablissement'];	
			if($etablissement != 'default'){
				$requete = $requete . " and etablissement.id_etablissement = '$etablissement'";
			}	
		}
		if(isset($_POST['departement'])){
			$departement = $_POST['departement'];	
			if($departement != 'default'){
				$requete = $requete . " and etablissement.departement = '$departement'";
			}
		}
		if(isset($_POST['prix'])){
			$prix = $_POST['prix'];	
			if($prix != ''){
				$requete = $requete . " and dispense.prix = '$prix'";
			}	
		}
		if(isset($_POST['jour'])){
			$jour = $_POST['jour'];	
			if($jour != 'default'){
				$requete = $requete . " and propose.jour = '$jour'";
			}	
		}
		if(isset($_POST['heure_debut'])){
			$heure_debut = $_POST['heure_debut'];	
			if($heure_debut != 'default'){
				$requete = $requete . " and propose.heure_debut = '$heure_debut'";
			}
		}
		if(isset($_POST['heure_fin'])){
			$heure_fin = $_POST['heure_fin'];	
			if($heure_fin != 'default'){
				$requete = $requete . " and propose.heure_fin = '$heure_fin'";
			}	
		}
		if(isset($_POST['note'])){
			$note = $_POST['note'];	
			if($note != ''){
				$requete = $requete . " and note >= '$note'";
			}	
		}
		if(isset($_POST['orderBy'])){
			$orderBy = $_POST['orderBy'];
			$order = '';	
			$croissantDecroissant = $_POST['croissantDecroissant'];
			if($orderBy != 'default'){
				$order = $order . " order by $orderBy $croissantDecroissant";
			}	
		}
		$this->vue->rechercheEtablissement($this->modele->rechercheEtablissement($requete, $order));
	}

	function noterEtablissementForm(){
		if(isset($_GET['id_etablissement'])){
			$etablissement = $_GET['id_etablissement'];	
			$this->vue->noterEtablissementForm($etablissement);
		}
	}

	function noterEtablissement(){
		if(isset($_GET['id_etablissement']) && isset($_POST['note'])){
			$etablissement = $_GET['id_etablissement'];	
			$note = $_POST['note'];
			$this->modele->noterEtablissement($note, $etablissement);
		}
	}

	function rechercheUserForm(){
		$this->vue->rechercheUserForm($this->modele->listeDepartement(), $this->modele->listeSport());
	}

	function rechercheUser(){
		$requete = ' where';
		if(isset($_POST['sport'])){
			$sport = $_POST['sport'];	
			if($sport != 'default'){
				$requete = $requete . " niveau.intitule = '$sport'";
			}	
			else{
				$requete = $requete . " 1=1";
			}
		}
		if(isset($_POST['niveau'])){
			$niveau = $_POST['niveau'];	
			if($niveau != 'default'){
				$requete = $requete . " and Niveau.niveau = '$niveau'";
			}
		}
		if(isset($_POST['departement'])){
			$departement = $_POST['departement'];	
			if($departement != 'default'){
				$requete = $requete . " and departement = '$departement'";
			}
		}
		if(isset($_POST['age'])){
			$age = $_POST['age'];	
			if($age != ''){
				$requete = $requete . " and age >= '$age'";
			}
		}
		if(isset($_POST['sexe'])){
			$sexe = $_POST['sexe'];	
			if($sexe != ''){
				$requete = $requete . " and sexe = '$sexe'";
			}
		}
		if(isset($_POST['note'])){
			$note = $_POST['note'];	
			if($note != ''){
				$requete = $requete . " and note >= '$note'";
			}	
		}
		if(isset($_POST['orderBy'])){
			$orderBy = $_POST['orderBy'];
			$order = '';	
			$croissantDecroissant = $_POST['croissantDecroissant'];
			if($orderBy != 'default'){
				$order = $order . " order by $orderBy $croissantDecroissant";
			}	
		}
		$this->vue->rechercheUser($this->modele->rechercheUser($requete, $order));
	}

	function noterUserForm(){
		if(isset($_GET['id_user'])){
			$user = $_GET['id_user'];	
			$this->vue->noterUserForm($user);
		}
	}

	function noterUser(){
		if(isset($_GET['id_user']) && isset($_POST['note'])){
			$user = $_GET['id_user'];	
			$note = $_POST['note'];
			$this->modele->noterUser($note, $user);
		}
	}


	
}
?>