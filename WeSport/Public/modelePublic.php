<?php
if(!defined('CONST_INCLUDE'))
die('Acces direct interdit!');
require_once('ModelePapa/modelePapa.php');

class ModelePublic extends modelePapa {

	function __construct(){
		parent::__construct();
	}

	// Departement 

	function listeDepartement(){
		$requete = self::$connexion->query('SELECT * from wesport.departement ORDER BY departement ASC');
		return $requete->fetchAll(PDO::FETCH_OBJ);
	}

	function listeEtablissement(){
		$requete = self::$connexion->query('SELECT * from wesport.etablissement ORDER BY nom ASC');
		return $requete->fetchAll(PDO::FETCH_OBJ);
	}

	function listeSport(){
		$requete = self::$connexion->query('SELECT * from wesport.sport ORDER BY intitule ASC');
		return $requete->fetchAll(PDO::FETCH_OBJ);
	}

	function rechercheEtablissement($cond, $order){
		$requete = self::$connexion->prepare('SELECT distinct id_etablissement, departement, nom, adresse, ville ,avg(note) as note, dispense.intitule,jour, heure_debut, heure_fin, prix from wesport.etablissement join wesport.noteEta using(id_etablissement) join wesport.dispense using(id_etablissement) join wesport.propose using(id_etablissement)'.$cond.' group by id_etablissement, nom, adresse, ville ,dispense.intitule, prix, jour, heure_debut, heure_fin '.$order);
		$requete->execute(array());
		return $requete->fetchAll(PDO::FETCH_OBJ);
	}

	function noterEtablissement($note, $etablissement){
		$requete = self::$connexion->prepare('INSERT into wesport.NoteEta (note, id_etablissement) values (?, ?)');
		$requete->execute(array($note, $etablissement));
	}

	function rechercheUser($cond, $order){
		$requete = self::$connexion->prepare('SELECT distinct id_user, departement, nom, prenom, age, sexe, telephone,avg(note) as note, niveau.intitule, niveau.niveau from wesport.user join wesport.notesUser using(id_user) join wesport.niveau using(id_user) '.$cond.' group by id_user, prenom, nom, age, sexe,telephone,niveau.intitule, departement, niveau.niveau '.$order);
		//var_dump$requete);
		$requete->execute(array());
		return $requete->fetchAll(PDO::FETCH_OBJ);
	}

	function noterUser($note, $user){
		$requete = self::$connexion->prepare('INSERT into wesport.NotesUser (note, id_user) values (?, ?)');
		$requete->execute(array($note, $user));
	}


	
}	
?>