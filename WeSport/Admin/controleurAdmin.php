<?php
if(!defined('CONST_INCLUDE'))
die('Acces direct interdit!');

require_once('Admin/modeleAdmin.php');
require_once('Admin/vueAdmin.php');

class ControleurAdmin {

	private $modele;
	private $vue;

	function __construct(){
		$this->modele = new ModeleAdmin();
		$this->vue = new VueAdmin();
		self::selectionPageAdmin();
	}

	//Accueil admin

	function accueilAdmin(){
		$this->vue->accueilAdmin();
	}


	// Switch action 

	function selectionPageAdmin(){
		if(isset($_GET['action'])){
			$action = $_GET['action'];	
		}
		else {
			$action = "";
		}
		
		switch ($action) {

			case 'listeDepartement':
				self::listeDepartement();
				break;
			case 'supprimerDepartement':
				self::supprimerDepartement();	
				self::listeDepartement();
				break;
			case 'ajouterDepartementForm':
				self::ajouterDepartementForm();	
				break;
			case 'ajouterDepartement':
				self::ajouterDepartement();	
				self::listeDepartement();
				break;
			case 'listeEtablissement':
				self::listeEtablissement();
				break;
			case 'supprimerEtablissement':
				self::supprimerEtablissement();
				self::listeEtablissement();
				break;
			case 'ajouterEtablissementForm':
				self::ajouterEtablissementForm();
				break;	
			case 'ajouterEtablissement':
				self::ajouterEtablissement();
				self::listeEtablissement();
				break;	
			case 'modifierEtablissementForm':
				self::modifierEtablissementForm();
				break;
			case 'modifierEtablissement':
				self::modifierEtablissement();
				self::listeEtablissement();
			break;
			case 'listeService':
				self::listeService();
				break;						
			case 'supprimerService':
				self::supprimerService();	
				self::listeService();
				break;
			case 'ajouterServiceForm':
				self::ajouterServiceForm();	
				break;
			case 'ajouterService':
				self::ajouterService();	
				self::listeService();
				break;
			case 'modifierServiceForm':
                self::modifierServiceForm();
                break;
            case 'modifierService':
                self::modifierService();
                self::listeService();
                break;
			case 'listeSport':
				self::listeSport();
				break;						
			case 'supprimerSport':
				self::supprimerSport();	
				self::listeSport();
				break;
			case 'ajouterSportForm':
				self::ajouterSportForm();	
				break;
			case 'ajouterSport':
				self::ajouterSport();	
				self::listeSport();
				break;
			case 'listeUser':
				self::listeUser();
				break;
			case 'supprimerUser':
				self::supprimerUser();
				self::listeUser();
				break;
			case 'ajouterUserForm':
				self::ajouterUserForm();
				break;	
			case 'ajouterUser':
				self::ajouterUser();
				self::listeUser();
				break;
			case 'modifierUserForm':
				self::modifierUserForm();
				break;
			case 'modifierUser':
				self::modifierUser();
				self::listeUser();
				break;
			case 'listeNiveau':
				self::listeNiveau();
				break;
			case 'ajouterNiveauForm':
				self::ajouterNiveauForm();
				break;
			case 'ajouterNiveau':
				self::ajouterNiveau();
				self::listeNiveau();
				break;
			case 'supprimerNiveau':
				self::supprimerNiveau();
				self::listeNiveau();
				break;
			 case 'modifierEtablissementService':
                self::modifierEtablissementService();
                break;
            case 'ajouterOffreForm':
                self::ajouterOffreForm();
                break;
            case 'ajouterOffre':
                self::ajouterOffre();
                self::modifierEtablissementService();
                break;
            case 'supprimerOffre':
                self::supprimerOffre();
                self::modifierEtablissementService();
                break;
            case 'modifierEtablissementSport':
            	self::modifierEtablissementSport();
            	break;
            case 'ajouterDispenseForm':
            	self::ajouterDispenseForm();
            	break;
            case 'ajouterDispense':
            	self::ajouterDispense();
            	self::modifierEtablissementSport();
            	break;
            case 'modifierDispenseForm':
            	self::modifierDispenseForm();
            	break;
            case 'modifierDispense':
            	self::modifierDispense();
            	self::modifierEtablissementSport();
            	break;
            case 'supprimerDispense':
            	self::supprimerDispense();
            	self::modifierEtablissementSport();
            	break;
            case 'listeHoraireSport':
            	self::listeHoraireSport();
            	break;
            case 'ajouterHoraireForm':
            	self::ajouterHoraireForm();
            	break;
            case 'ajouterHoraire':
            	self::ajouterHoraire();
            	self::listeHoraireSport();
            	break;
            case 'supprimerHoraire':
            	self::supprimerHoraire();
            	self::listeHoraireSport();
            	break;
			default:
				self::accueilAdmin();
			break;

		}
	}

	// Departements

	function listeDepartement(){
		$this->vue->listeDepartement($this->modele->listeDepartement());
	}

	function supprimerDepartement(){
		if(isset($_GET['departement'])){
			$departement = $_GET['departement'];	

			$this->modele->supprimerDepartement($departement);
		}	
	}

	function ajouterDepartementForm(){
		$this->vue->ajouterDepartementForm();
	}

	function ajouterDepartement(){
		if(isset($_POST['departement'])){
			$departement = $_POST['departement'];	

			$this->modele->ajouterDepartement($departement);
		}	
	}

	// Etablissements

	function listeEtablissement(){
		$this->vue->listeEtablissement($this->modele->listeEtablissement());
	}

	function supprimerEtablissement(){
		if(isset($_GET['id_etablissement'])){
			$etablissement = $_GET['id_etablissement'];	

			$this->modele->supprimerEtablissementFromOffre($etablissement);
			$this->modele->supprimerEtablissementFromPropose($etablissement);
			$this->modele->supprimerEtablissementFromDispense($etablissement);
			$this->modele->supprimerEtablissementFromNotesEta($etablissement);
			$this->modele->supprimerEtablissement($etablissement);
		}
	}

	function ajouterEtablissementForm(){
		$this->vue->ajouterEtablissementForm($this->modele->listeDepartement());
	}

	function ajouterEtablissement(){
		if(isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['departement'])){
			$nom = $_POST['nom'];$adresse = $_POST['adresse'];$ville = $_POST['ville'];$departement = $_POST['departement'];	
			$this->modele->ajouterEtablissement($nom, $adresse, $ville, $departement);
		}
	}

	function modifierEtablissementForm(){
		if(isset($_GET['id_etablissement'])){
			$etablissement = $_GET['id_etablissement'];	
			$this->vue->modifierEtablissementForm($this->modele->listeDepartement(),$this->modele->getEtablissement($etablissement));
		}	
	}

	function modifierEtablissement(){
		if(isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['departement']) && isset($_GET['id_etablissement'])){
			$nom = $_POST['nom'];$adresse = $_POST['adresse'];$ville = $_POST['ville'];$departement = $_POST['departement']; $etablissement = $_GET['id_etablissement'];	
			$this->modele->updateEtablissement($etablissement, $nom, $adresse, $ville, $departement);	
		}
	}

	// Service

	function listeService(){
		$this->vue->listeService($this->modele->listeService());
	}

	function supprimerService(){
		if(isset($_GET['service'])){
			$service = $_GET['service'];	
		}
		$this->modele->supprimerServiceOffre($service);
		$this->modele->supprimerService($service);
	}

	function ajouterServiceForm(){
		$this->vue->ajouterServiceForm();
	}

	function ajouterService(){
		if(isset($_POST['service'])){
			$service = $_POST['service'];	
		}
		$this->modele->ajouterService($service);
	}

	function modifierServiceForm(){
        if(isset($_GET['service'])){
            $service = $_GET['service'];
            $this->vue->modifierServiceForm($service);
        }
    }

    function modifierService(){
        if(isset($_GET['service'])){
            $service= $_GET['service'];
            $this->modele->updateService($service);
        }
    }

	// SPORT

	function listeSport(){
		$this->vue->listeSport($this->modele->listeSport());
	}
	
	function supprimerSport(){
		if(isset($_GET['sport'])){
			$sport = $_GET['sport'];	
		}
		$this->modele->supprimerSportNiveau($sport);
		$this->modele->supprimerSportDispense($sport);
		$this->modele->supprimerSportPropose($sport);
		$this->modele->supprimerSport($sport);
	}

	function ajouterSportForm(){
		$this->vue->ajouterSportForm();
	}

	function ajouterSport(){
		if(isset($_POST['sport'])){
			$sport = $_POST['sport'];	
		}
		$this->modele->ajouterSport($sport);
	}

	// USER

	function listeUser(){
		$this->vue->listeUser($this->modele->listeUser());
	}

	function supprimerUser(){
		if(isset($_GET['id_user'])){
			$user = $_GET['id_user'];	
		}
		$this->modele->supprimerUserNiveau($user);
		$this->modele->supprimerUserNotesUser($user);
		$this->modele->supprimerUser($user);
	}

	function ajouterUserForm(){
		$this->vue->ajouterUserForm($this->modele->listeDepartement());
	}

	function ajouterUser(){
		 if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['age']) && isset($_POST['sexe']) && isset($_POST['telephone']) && isset($_POST['departement'])){
			$prenom = $_POST['prenom'];	
			$nom = $_POST['nom'];	
			$age = $_POST['age'];	
			$sexe = $_POST['sexe'];	
			$telephone = $_POST['telephone'];
			$departement = $_POST['departement'];
			$this->modele->ajouterUser($prenom, $nom, $age, $sexe, $telephone, $departement);
		} 
	}

	function modifierUserForm(){
		if(isset($_GET['id_user'])){
			$user = $_GET['id_user'];	
		}
		$this->vue->modifierUserForm($this->modele->listeDepartement(), $this->modele->listeSport(), $this->modele->getNiveauByUser($user), $this->modele->listeNiveau(), $this->modele->getUser($user));
	}

	function modifierUser(){
		if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['age']) && isset($_POST['sexe']) && isset($_POST['telephone'])&& isset($_POST['departement']) && isset($_GET['id_user'])){
			$prenom = $_POST['prenom'];$nom = $_POST['nom'];$age = $_POST['age'];$sexe = $_POST['sexe'];$telephone = $_POST['telephone']; $departement = $_POST['departement'];$user = $_GET['id_user'];
			$this->modele->updateUser($user, $prenom, $nom, $age, $sexe, $telephone, $departement);
		}

		if(isset($_POST['sport']) && isset($_POST['niveau'])) {
			$user = $_GET['id_user'];
			for ($i = 1; $i <= count($_POST['sport']); $i++) {
				
				$intitule = $_POST['sport'][$i];
				$newNiveau = $_POST['niveau'][$i];

				$this->modele->updateUserNiveau($newNiveau, $user, $intitule);

			}
		}
	}

	//NIVEAU

	function listeNiveau(){
		$this->vue->listeNiveau($this->modele->listeSport(),$this->modele->listeNiveau(),$this->modele->listeUser());
	}

	function ajouterNiveauForm(){
		$this->vue->ajouterNiveauForm($this->modele->listeSport(), $this->modele->listeUser());
	}

	function ajouterNiveau(){
		if(isset($_POST['user']) && isset($_POST['niveau']) && isset($_POST['sport']) && isset($_GET['id_user'])){
			$user = $_GET['id_user'];
			$sport = $_POST['sport'];
			$niveau = $_POST['niveau'];

			$this->modele->ajouterNiveau($niveau, $user, $sport);
		}
	}

	function supprimerNiveau(){
		if(isset($_GET['intitule']) && isset($_GET['id_user'])){
			$intitule = $_GET['intitule'];
			$user = $_GET['id_user'];

			$this->modele->supprimerNiveau($user, $intitule);
		}
	}

//OFFRE

	 function modifierEtablissementService(){
    	if(isset($_GET['id_etablissement'])){
    		$etablissement = $_GET['id_etablissement'];
    		$this->vue->modifierEtablissementService($this->modele->getEtablissement($etablissement),$this->modele->listeOffre($etablissement));
    	}
    }

    function ajouterOffreForm(){
        if(isset($_GET['id_etablissement'])){
    		$etablissement = $_GET['id_etablissement'];
        	$this->vue->ajouterOffreForm($this->modele->listeNonOffre($etablissement),$this->modele->getEtablissement($etablissement));
        }
    }

    function ajouterOffre(){
        if(isset($_GET['id_etablissement']) && isset($_POST['service'])) {
            $etablissement = $_GET['id_etablissement'];
            $service = $_POST['service'];
            $this->modele->ajouterOffre($etablissement, $service);
        }
    }

    function supprimerOffre(){
        if(isset($_GET['id_etablissement'])&& isset($_GET['service'])){
            $etablissement = $_GET['id_etablissement'];
            $service = $_GET['service'];
            $this->modele->supprimerOffre($etablissement, $service);
        }
    }

//DISPENSE

    function modifierEtablissementSport(){
    	if(isset($_GET['id_etablissement'])){
    		$etablissement = $_GET['id_etablissement'];
    		$this->vue->modifierEtablissementSport($this->modele->getEtablissement($etablissement),$this->modele->listeDispense($etablissement));
    	}
    }

    function ajouterDispenseForm(){
    	if(isset($_GET['id_etablissement'])){
    		$etablissement = $_GET['id_etablissement'];
        	$this->vue->ajouterDispenseForm($this->modele->listeNonDispense($etablissement),$this->modele->getEtablissement($etablissement));
        }
    }

    function ajouterDispense(){
        if(isset($_GET['id_etablissement']) && isset($_POST['sport']) && isset($_POST['prix'])) {
            $etablissement = $_GET['id_etablissement'];
            $sport = $_POST['sport'];
            $prix = $_POST['prix'];
            $this->modele->ajouterDispense($prix, $sport, $etablissement);
        }
    }

    function modifierDispenseForm(){
    	if(isset($_GET['id_etablissement']) && isset($_GET['sport'])) {
            $etablissement = $_GET['id_etablissement'];
            $sport = $_GET['sport'];
            $this->vue->modifierDispenseForm($this->modele->getEtablissement($etablissement), $sport);
    	}
    }

    function modifierDispense(){
    	if(isset($_GET['id_etablissement']) && isset($_GET['sport']) && isset($_POST['prix'])){
            $etablissement = $_GET['id_etablissement'];
            $sport = $_GET['sport'];
            $prix = $_POST['prix'];
            $this->modele->modifierDispense($prix, $sport, $etablissement);    		
    	}
    }

    function supprimerDispense(){
        if(isset($_GET['id_etablissement']) && isset($_GET['sport']) && isset($_GET['prix'])){
            $etablissement = $_GET['id_etablissement'];
            $sport = $_GET['sport'];
            $prix = $_GET['prix'];
            $this->modele->supprimerDispense($etablissement, $sport, $prix);
        }
    }
    //Propose

    function listeHoraireSport(){
    	if(isset($_GET['id_etablissement']) && isset($_GET['sport'])){
            $etablissement = $_GET['id_etablissement'];
            $sport = $_GET['sport'];
            $this->vue->listeHoraireSport($this->modele->getEtablissement($etablissement),$sport,$this->modele->listePropose($etablissement,$sport));
    	}
	}

	function ajouterHoraireForm(){
		if(isset($_GET['id_etablissement']) && isset($_GET['sport'])){
			$etablissement = $_GET['id_etablissement'];
            $sport = $_GET['sport'];
            $this->vue->ajouterHoraireForm($this->modele->getEtablissement($etablissement),$sport);
        }
	}

	function ajouterHoraire(){
		if(isset($_GET['id_etablissement']) && isset($_GET['sport']) && isset($_POST['jour']) && isset($_POST['heure_debut']) && isset($_POST['heure_fin'])){
			$etablissement = $_GET['id_etablissement'];
            $sport = $_GET['sport'];
            $jour = $_POST['jour'];
            $heure_debut = $_POST['heure_debut'];
            $heure_fin = $_POST['heure_fin'];
            $this->modele->ajouterHoraire($jour, $heure_debut, $heure_fin, $sport, $etablissement);
        }
	}

	function supprimerHoraire(){
		if(isset($_GET['id_etablissement']) && isset($_GET['sport']) && isset($_GET['jour']) && isset($_GET['heure_debut']) && isset($_GET['heure_fin'])){
			$etablissement = $_GET['id_etablissement'];
            $sport = $_GET['sport'];
            $jour = $_GET['jour'];
            $heure_debut = $_GET['heure_debut'];
            $heure_fin = $_GET['heure_fin'];
            $this->modele->supprimerHoraire($jour, $heure_debut, $heure_fin, $sport, $etablissement);
		}
	}}
?>