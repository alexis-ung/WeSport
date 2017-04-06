<?php
if(!defined('CONST_INCLUDE'))
die('Acces direct interdit!');
require_once('ModelePapa/modelePapa.php');

class ModeleAdmin extends modelePapa {

	function __construct(){
		parent::__construct();
	}

	// Departement 

	function listeDepartement(){
		$requete = self::$connexion->query('SELECT * from wesport.departement ORDER BY departement ASC');
		return $requete->fetchAll(PDO::FETCH_OBJ);
	}

	function supprimerDepartement($departement){
		$requete = self::$connexion->prepare('DELETE from wesport.departement where departement=?');
		$requete->execute(array($departement));
	}

	function ajouterDepartement($departement){
		$requete = self::$connexion->prepare('INSERT into wesport.departement values (?)');
		$requete->execute(array($departement));
	}

	// Etablissement

	function listeEtablissement(){
		$requete = self::$connexion->query('SELECT * from wesport.etablissement ORDER BY id_etablissement ASC');
		return $requete->fetchAll(PDO::FETCH_OBJ);
	}

	function supprimerEtablissement($id_etablissement){
		$requete = self::$connexion->prepare('DELETE from wesport.etablissement where id_etablissement=?');
		$requete->execute(array($id_etablissement));
	}

	function supprimerEtablissementFromOffre($id_etablissement){
		$requete = self::$connexion->prepare('DELETE from wesport.Offre where id_etablissement=?');
		$requete->execute(array($id_etablissement));
	}

	function supprimerEtablissementFromPropose($id_etablissement){
		$requete = self::$connexion->prepare('DELETE from wesport.Propose where id_etablissement=?');
		$requete->execute(array($id_etablissement));
	}

	function supprimerEtablissementFromDispense($id_etablissement){
		$requete = self::$connexion->prepare('DELETE from wesport.Dispense where id_etablissement=?');
		$requete->execute(array($id_etablissement));
	}

	function supprimerEtablissementFromNotesEta($id_etablissement){
		$requete = self::$connexion->prepare('DELETE from wesport.NoteEta where id_etablissement=?');
		$requete->execute(array($id_etablissement));
	}

	function getEtablissement($id_etablissement){
		$requete = self::$connexion->prepare('SELECT * from wesport.Etablissement where id_etablissement=?');
		$requete->execute(array($id_etablissement));
		return $requete->fetch(PDO::FETCH_OBJ);
	}

	function ajouterEtablissement($nom, $adresse, $ville, $departement){
		$requete = self::$connexion->prepare('INSERT into wesport.Etablissement (nom, adresse, ville, departement) values (?, ?, ?, ?)');
		$requete->execute(array($nom, $adresse, $ville, $departement));
	}

	function updateEtablissement($etablissement, $nom, $adresse, $ville, $departement){
		$requete = self::$connexion->prepare('UPDATE wesport.Etablissement SET nom=?, adresse=?, ville=?, departement=? WHERE id_etablissement=?');
		$requete->execute(array($nom, $adresse, $ville, $departement, $etablissement));
	}

	//Service

	function listeService(){
		$requete = self::$connexion->query('SELECT * from wesport.service ORDER BY service ASC');
		return $requete->fetchAll(PDO::FETCH_OBJ);
	}
	
	function supprimerServiceOffre($service){
		$requete = self::$connexion->prepare('DELETE from wesport.offre where service=?');
		$requete->execute(array($service));
	}

	function supprimerService($service){
		$requete = self::$connexion->prepare('DELETE from wesport.service where service=?');
		$requete->execute(array($service));
	}

	function ajouterService($service){
		$requete = self::$connexion->prepare('INSERT into wesport.service values (?)');
		$requete->execute(array($service));
	}

	function updateService($service)
    {
        $requete = self::$connexion->prepare('UPDATE wesport.service SET service=? where service=?');
        $requete->execute(array($service, $service));
    }

	// Liste Sport

	function listeSport(){
		$requete = self::$connexion->query('SELECT * from wesport.sport ORDER BY intitule ASC');
		return $requete->fetchAll(PDO::FETCH_OBJ);
	}
	
	function supprimerSportNiveau($sport){
		$requete = self::$connexion->prepare('DELETE from wesport.niveau where intitule=?');
		$requete->execute(array($sport));
	}

	function supprimerSportDispense($sport){
		$requete = self::$connexion->prepare('DELETE from wesport.dispense where intitule=?');
		$requete->execute(array($sport));
	}

	function supprimerSportPropose($sport){
		$requete = self::$connexion->prepare('DELETE from wesport.propose where intitule=?');
		$requete->execute(array($sport));
	}

	function supprimerSport($sport){
		$requete = self::$connexion->prepare('DELETE from wesport.sport where intitule=?');
		$requete->execute(array($sport));
	}

	function ajouterSport($sport){
		$requete = self::$connexion->prepare('INSERT into wesport.sport values (?)');
		$requete->execute(array($sport));
	}

	// Liste User

	function listeUser(){
		$requete = self::$connexion->query('SELECT * from wesport.user ORDER BY id_user ASC');
		return $requete->fetchAll(PDO::FETCH_OBJ);
	}

	function supprimerUserNiveau($user){
		$requete = self::$connexion->prepare('DELETE from wesport.niveau where id_user=?');
		$requete->execute(array($user)); 
	}

	function supprimerUserNotesUser($user){
		$requete = self::$connexion->prepare('DELETE from wesport.notesUser where id_user=?');
		$requete->execute(array($user)); 
	}

	function supprimerUser($user){
		$requete = self::$connexion->prepare('DELETE from wesport.user where id_user=?');
		$requete->execute(array($user));
	}

	function getUser($id_user){
		$requete = self::$connexion->prepare('SELECT * from wesport.user where id_user=?');
		$requete->execute(array($id_user));
		return $requete->fetch(PDO::FETCH_OBJ);
	}

	function ajouterUser($prenom, $nom, $age, $sexe, $telephone, $departement){
		$requete = self::$connexion->prepare('INSERT into wesport.user (prenom, nom, age, sexe, telephone, departement) values (?, ?, ?, ?, ?, ?)');
		$requete->execute(array($prenom, $nom, $age, $sexe, $telephone, $departement));
	}

	function updateUser($user, $prenom, $nom, $age, $sexe, $telephone, $departement){
		$requete = self::$connexion->prepare('UPDATE wesport.User SET prenom=?, nom=?, age=?, sexe=?, telephone=?, departement=? WHERE id_user=?');
		$requete->execute(array($prenom, $nom, $age, $sexe, $telephone, $departement, $user));
	}

	//NIVEAU

	function listeNiveau(){ 
	    $requete = self::$connexion->query('SELECT * from wesport.niveau ORDER BY id_user ASC');
	    return $requete->fetchAll(PDO::FETCH_OBJ);
    }

	function getNiveauByUser($user){    
	    $requete = self::$connexion->prepare('SELECT * from wesport.niveau where id_user=?');
	    $requete->execute(array($user));
	    return $requete->fetchAll(PDO::FETCH_OBJ);
    }
	function updateUserNiveau($niveau, $user, $intitule){
		$requete = self::$connexion->prepare('UPDATE wesport.niveau SET niveau=? WHERE id_user=? AND intitule=?');
		$requete->execute(array($niveau, $user, $intitule));
	}

	function ajouterNiveau($niveau, $user, $sport){
		$requete = self::$connexion->prepare('INSERT into wesport.niveau (niveau, id_user, intitule) values (?,?,?)');
		$requete->execute(array($niveau, $user, $sport));
	}

	function supprimerNiveau($user,$intitule){
		$requete = self::$connexion->prepare('DELETE from wesport.niveau WHERE id_user=? AND intitule=?');
		$requete->execute(array($user,$intitule));
	}

	//OFFRE

    function listeOffre($id_etablissement)
    {
        $requete = self::$connexion->prepare('SELECT * from wesport.offre WHERE id_etablissement=?');
        $requete->execute(array($id_etablissement));
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    function listeNonOffre($id_etablissement)
    {
        $requete = self::$connexion->prepare('SELECT * FROM wesport.service WHERE service NOT IN (SELECT service from wesport.offre WHERE id_etablissement=?)');
        $requete->execute(array($id_etablissement));
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    function ajouterOffre($etablissement, $service)
    {
        $requete = self::$connexion->prepare('INSERT into wesport.offre(id_etablissement, service) values (?,?)');
        $requete->execute(array($etablissement, $service));
    }

    function supprimerOffre($etablissement, $service){
        $requete = self::$connexion->prepare('DELETE FROM wesport.offre WHERE (id_etablissement=? AND service=?)');
        $requete->execute(array($etablissement, $service));
    }

	//Dispense 
    function listeDispense($id_etablissement)
    {
        $requete = self::$connexion->prepare('SELECT * from wesport.dispense WHERE id_etablissement=?');
        $requete->execute(array($id_etablissement));
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    function listeNonDispense($id_etablissement)
    {
        $requete = self::$connexion->prepare('SELECT * FROM wesport.sport WHERE intitule NOT IN (SELECT intitule from wesport.dispense WHERE id_etablissement=?)');
        $requete->execute(array($id_etablissement));
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    function modifierDispense($prix, $sport, $etablissement)
    {
        $requete = self::$connexion->prepare('UPDATE wesport.dispense SET prix=? WHERE (id_etablissement=? AND intitule=?)');
        $requete->execute(array($prix, $etablissement, $sport));
    }

    function ajouterDispense($prix, $sport, $etablissement)
    {
        $requete = self::$connexion->prepare('INSERT into wesport.dispense(prix, intitule, id_etablissement) values (?,?,?)');
        $requete->execute(array($prix, $sport, $etablissement));
    }


    function supprimerDispense($etablissement, $sport, $prix){
        $requete = self::$connexion->prepare('DELETE FROM wesport.dispense WHERE (id_etablissement=? AND intitule=? AND prix=?)');
        $requete->execute(array($etablissement, $sport, $prix));
    }

    //Propose

    function listePropose($etablissement,$sport){
        $requete = self::$connexion->prepare('SELECT * from wesport.propose WHERE id_etablissement=? AND intitule=? ORDER BY jour ASC');
        $requete->execute(array($etablissement,$sport));
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    function ajouterHoraire($jour, $heure_debut, $heure_fin, $sport, $etablissement){
        $requete = self::$connexion->prepare('INSERT into wesport.propose(jour, heure_debut, heure_fin, intitule, id_etablissement) values (?,?,?,?,?)');
        $requete->execute(array($jour, $heure_debut, $heure_fin, $sport, $etablissement));
    }

    function supprimerHoraire($jour, $heure_debut, $heure_fin, $sport, $etablissement){
        $requete = self::$connexion->prepare('DELETE FROM wesport.propose WHERE jour=? AND heure_debut=? AND heure_fin=? AND intitule=? AND id_etablissement=?');
        $requete->execute(array($jour, $heure_debut, $heure_fin, $sport, $etablissement));
    }
	
}	
?>