<?php 
if(!defined('CONST_INCLUDE'))
die('Acces direct interdit!');

require_once('VuePapa/vuePapa.php');
require_once('controleurAdmin.php');

class VueAdmin extends VuePapa{

	private $modeleAdmin; 

	function __construct(){
		parent::__construct();
		$this->modeleAdmin = new ModeleAdmin(); 
	}

	// Accueil admin

	function accueilAdmin(){
		echo "	<a href=\"index.php\"><button type=\"button\" class=\"btn btn-info\"> < Retour à l'accueil</button></a>
				<h1>Accueil admin</h1>
				<a href=\"index.php?module=admin&action=listeDepartement\">Département</a></br>
				<a href=\"index.php?module=admin&action=listeEtablissement\">Etablissement</a></br>
				<a href=\"index.php?module=admin&action=listeService\">Service</a></br>
				<a href=\"index.php?module=admin&action=listeSport\">Sport</a></br>
				<a href=\"index.php?module=admin&action=listeNiveau\">Gérer les sports et niveaux des utilisateurs</a></br>
				<a href=\"index.php?module=admin&action=listeUser\">Utilisateurs</a></br>

				";
		parent::printView();
	}

	// Departements 


	function listeDepartement($listeDepartement){
		echo "	<div class=\"col-lg-offset-1 col-lg-10 \">	
					<a href=\"index.php?module=admin\"><button type=\"button\" class=\"btn btn-info\"> < Retour à l'accueil Admin</button></a>
					<h2>Administration des départements</h2>
					<h3><a href=\"index.php?module=admin&action=ajouterDepartementForm\">+ Ajouter un département<a></h3>
					<table class=\"table table-hover\">
						<thead>
							<tr>
								<th>Département</th>
								
							</tr>
						</thead>
						<tbody>";
			foreach ($listeDepartement as $departement) {
				echo "		<tr>
								<th>$departement->departement</th>
								<th><a href=\"index.php?module=admin&action=supprimerDepartement&departement=$departement->departement\">Supprimer<a></th>
							</tr>";
			}
			echo "		</tbody>			
					</table>
				</div>";

		parent::printView();
	}

	function ajouterDepartementForm(){
		echo "	<div class=\"col-lg-offset-1 col-lg-10 \">
					<a href=\"index.php?module=admin&action=listeDepartement\"><button type=\"button\" class=\"btn btn-info\"> < Retour à la liste des départements</button></a>
					<h2>Administration des départements</h2>
					<h3>Ajout d'un département</h3>
						<form action=\"index.php?module=admin&action=ajouterDepartement\" method= \"post\">
							<div class=\"form-group\">
								<label> N° du département : </label><input class=\"form-control\" type=\"text\" name=\"departement\">
							</div>
							<input class=\"btn btn-default\" type=\"submit\" value= \"Ajouter le département\">
						</form>
				</div>";			
		parent::printView();
	}

	// Etablissements

	function listeEtablissement($listeEtablissement){
		echo "	<div class=\"col-lg-offset-1 col-lg-10 \">	
					<a href=\"index.php?module=admin\"><button type=\"button\" class=\"btn btn-info\"> < Retour à l'accueil Admin</button></a>
					<h2>Administration des établissements</h2>
					<h3><a href=\"index.php?module=admin&action=ajouterEtablissementForm\">+ Ajouter un établissement<a></h3>
					<table class=\"table table-hover\">
						<thead>
							<tr>
								<th>Établissement</th>
								<th>Adresse</th>
								<th>Ville</th>
								<th>Département</th>
							</tr>
						</thead>
						<tbody>";
			foreach ($listeEtablissement as $etablissement) {
				echo "		<tr>
								<th>$etablissement->nom</th>
								<th>$etablissement->adresse</th>
								<th>$etablissement->ville</th>
								<th>$etablissement->departement</th>		
								<th><a href=\"index.php?module=admin&action=modifierEtablissementForm&id_etablissement=$etablissement->id_etablissement\">Modifier<a></th>
								<th><a href=\"index.php?module=admin&action=modifierEtablissementSport&id_etablissement=$etablissement->id_etablissement\">Sports<a></th>
								<th><a href=\"index.php?module=admin&action=modifierEtablissementService&id_etablissement=$etablissement->id_etablissement\">Service<a></th>
								<th><a href=\"index.php?module=admin&action=supprimerEtablissement&id_etablissement=$etablissement->id_etablissement\">Supprimer<a></th>
							</tr>";
			}
			echo "		</tbody>			
					</table>
				</div>";

		parent::printView();
	}

	function ajouterEtablissementForm($listeDepartement){
		echo "	<div class=\"col-lg-offset-1 col-lg-10 \">
					<a href=\"index.php?module=admin&action=listeEtablissement\"><button type=\"button\" class=\"btn btn-info\"> < Retour à la liste d'établissements</button></a>
					<h2>Administration des établissements</h2>
					<h3>Ajout d'un établissement</h3>
						<form action=\"index.php?module=admin&action=ajouterEtablissement\" method= \"post\">
							<div class=\"form-group\">
								<label> Nom : </label><input class=\"form-control\" type=\"text\" name=\"nom\">
							</div>
							<div class=\"form-group\">
								<label> Adresse : </label><input class=\"form-control\" type=\"text\" name=\"adresse\">
							</div>
							<div class=\"form-group\">
								<label> Ville : </label><input class=\"form-control\" type=\"text\" name=\"ville\">
							</div>
							<div class=\"form-group\">
								<label> Departement : </label><select class=\"form-control\" name=\"departement\">";
		foreach ($listeDepartement as $departement) {
			echo "					<option value=\"$departement->departement\">$departement->departement</option>";
		}
		echo "					</select>
							</div>
							<input class=\"btn btn-default\" type=\"submit\" value= \"Ajouter l'établissement\">
						</form>
				</div>";			
		parent::printView();
	}

	function modifierEtablissementForm($listeDepartement, $etablissement){
		echo "	<div class=\"col-lg-offset-1 col-lg-10 \">
					<a href=\"index.php?module=admin&action=listeEtablissement\"><button type=\"button\" class=\"btn btn-info\"> < Retour à la liste d'établissements</button></a>
					<h2>Administration des établissements</h2>
					<h3>Modification d'un établissement</h3>
						<form action=\"index.php?module=admin&action=modifierEtablissement&id_etablissement=$etablissement->id_etablissement\" method= \"post\">
							<div class=\"form-group\">
								<label> Nom : </label><input class=\"form-control\" type=\"text\" name=\"nom\" value=\"$etablissement->nom\">
							</div>
							<div class=\"form-group\">
								<label> Adresse : </label><input class=\"form-control\" type=\"text\" name=\"adresse\" value=\"$etablissement->adresse\">
							</div>
							<div class=\"form-group\">
								<label> Ville : </label><input class=\"form-control\" type=\"text\" name=\"ville\" value=\"$etablissement->ville\">
							</div>
							<div class=\"form-group\">
								<label> Departement : </label><select class=\"form-control\" name=\"departement\">
									<option value=\"$etablissement->departement\">$etablissement->departement</option>";
		foreach ($listeDepartement as $departement) {
			echo "					<option value=\"$departement->departement\">$departement->departement</option>";
		}
		echo "					</select>
							</div>
							<input class=\"btn btn-default\" type=\"submit\" value= \"Modifier l'établissement\">
						</form>
				</div>";			
		parent::printView();
	}

	// Service

	function listeService($listeService){
		echo "	<div class=\"col-lg-offset-1 col-lg-10 \">	
					<a href=\"index.php?module=admin\"><button type=\"button\" class=\"btn btn-info\"> < Retour à l'accueil Admin</button></a>
					<h2>Administration des services</h2>
					<h3><a href=\"index.php?module=admin&action=ajouterServiceForm\">+ Ajouter un service<a></h3>
					<table class=\"table table-hover\">
						<thead>
							<tr>
								<th>Service</th>
								
							</tr>
						</thead>
						<tbody>";
			foreach ($listeService as $service) {
				echo "		<tr>
								<th>$service->service</th>
								<th><a href=\"index.php?module=admin&action=supprimerService&service=$service->service\">Supprimer<a></th>
							</tr>";
			}
			echo "		</tbody>			
					</table>
				</div>";

		parent::printView();
	}

	function ajouterServiceForm(){
		echo "	<div class=\"col-lg-offset-1 col-lg-10 \">
					<a href=\"index.php?module=admin&action=listeService\"><button type=\"button\" class=\"btn btn-info\"> < Retour à la liste de services</button></a>
					<h2>Administration des services</h2>
					<h3>Ajout d'un service</h3>
						<form action=\"index.php?module=admin&action=ajouterService\" method= \"post\">
							<div class=\"form-group\">
								<label> Intitulé du service : </label><input class=\"form-control\" type=\"text\" name=\"service\">
							</div>
							<input class=\"btn btn-default\" type=\"submit\" value= \"Ajouter le service\">
						</form>
				</div>";			
		parent::printView();
	}

// Admin des sports

	function listeSport($listeSport){
		echo "	<div class=\"col-lg-offset-1 col-lg-10 \">
					<a href=\"index.php?module=admin\"><button type=\"button\" class=\"btn btn-info\"> < Retour à l'accueil Admin</button></a>	
					<h2>Administration des sports</h2>
					<h3><a href=\"index.php?module=admin&action=ajouterSportForm\">+ Ajouter un sport<a></h3>
					<table class=\"table table-hover\">
						<thead>
							<tr>
								<th>Sport</th>
								
							</tr>
						</thead>
						<tbody>";
			foreach ($listeSport as $intitule) {
				echo "		<tr>
								<th>$intitule->intitule</th>
								<th><a href=\"index.php?module=admin&action=supprimerSport&sport=$intitule->intitule\">Supprimer<a></th>
							</tr>";
			}
			echo "		</tbody>			
					</table>
				</div>";

		parent::printView();
	}

	function ajouterSportForm(){
		echo "	<div class=\"col-lg-offset-1 col-lg-10 \">
					<a href=\"index.php?module=admin&action=listeSport\"><button type=\"button\" class=\"btn btn-info\"> < Retour à la liste de sports</button></a>
					<h2>Administration des sports</h2>
					<h3>Ajout d'un sport</h3>
						<form action=\"index.php?module=admin&action=ajouterSport\" method= \"post\">
							<div class=\"form-group\">
								<label> Intitulé du sport : </label><input class=\"form-control\" type=\"text\" name=\"sport\">
							</div>
							<input class=\"btn btn-default\" type=\"submit\" value= \"Ajouter le sport\">
						</form>
				</div>";			
		parent::printView();
	}

	// Admin des users

	function listeUser($listeUser){
		echo "	<div class=\"col-lg-offset-1 col-lg-10 \">
					<a href=\"index.php?module=admin\"><button type=\"button\" class=\"btn btn-info\"> < Retour à l'accueil Admin</button></a>	
					<h2>Administration des utilisateurs</h2>
					<h3><a href=\"index.php?module=admin&action=ajouterUserForm\">+ Ajouter un utilisateur<a></h3>
					<table class=\"table table-hover\">
						<thead>
							<tr>
								<th>Prénom</th>
								<th>Nom</th>
								<th>Âge</th>
								<th>Sexe</th>
								<th>Nº de téléphone</th>
								<th>Département</th>
								<th>Sports & Niveaux</th> 
							</tr>
						</thead>
						<tbody>";
			foreach ($listeUser as $user) {
				$listeNiveau = $this->modeleAdmin->getNiveauByUser($user->id_user);
				echo "		<tr>
								<th>$user->prenom</th>
								<th>$user->nom</th>
								<th>$user->age</th>
								<th>$user->sexe</th>
								<th>$user->telephone</th>
								<th>$user->departement</th>
                                <th>"; 
                                foreach ($listeNiveau as $niveau){
                                	if ($niveau) { echo $niveau->intitule . " : " . $niveau->niveau . "</br>"; } // GR
                                }
                echo "</th>";

				echo "			
								<th><a href=\"index.php?module=admin&action=modifierUserForm&id_user=$user->id_user\">Modifier<a></th>
								<th><a href=\"index.php?module=admin&action=supprimerUser&id_user=$user->id_user\">Supprimer<a></th>
							</tr>";
			}
			echo "		</tbody>			
					</table>
				</div>";

		parent::printView();
	}

	function ajouterUserForm($listeDepartement){
		echo "	<div class=\"col-lg-offset-1 col-lg-10 \">
					<a href=\"index.php?module=admin&action=listeUser\"><button type=\"button\" class=\"btn btn-info\"> < Retour à la liste de users</button></a>
					<h2>Administration des utilisateurs</h2>
					<h3>Ajout d'un utilisateur</h3>
						<form action=\"index.php?module=admin&action=ajouterUser\" method= \"post\">
							<div class=\"form-group\">
								<label> Prénom : </label><input class=\"form-control\" type=\"text\" name=\"prenom\">
							</div>
							<div class=\"form-group\">
								<label> Nom : </label><input class=\"form-control\" type=\"text\" name=\"nom\">
							</div>
							<div class=\"form-group\">
								<label> Âge : </label><input class=\"form-control\" type=\"text\" name=\"age\">
							</div>
							<div class=\"form-group\">
								<label> Sexe : 
								<label class=\"radio-inline\"><input type=\"radio\" name=\"sexe\" value=\"F\"> F </label>
								<label class=\"radio-inline\"><input type=\"radio\" name=\"sexe\" value=\"M\"> M </label>
							</div>
							<div class=\"form-group\">
								<label> Téléphone : </label><input class=\"form-control\" type=\"text\" name=\"telephone\">
							</div>
							<div class=\"form-group\">
								<label> Departement : </label><select class=\"form-control\" name=\"departement\">";
		foreach ($listeDepartement as $departement) {
			echo "					<option value=\"$departement->departement\">$departement->departement</option>";
		}
		echo "					</select>
							</div>
							<input class=\"btn btn-default\" type=\"submit\" value= \"Ajouter l'utilisateur\">
						</form>
				</div>";			
		parent::printView();
	}

	function modifierUserForm($listeDepartement, $listeSport, $listeNiveauUser, $listeNiveau, $user){
		echo "	<div class=\"col-lg-offset-1 col-lg-10 \">
					<a href=\"index.php?module=admin&action=listeUser\"><button type=\"button\" class=\"btn btn-info\"> < Retour à la liste de users</button></a>
					<h2>Administration des utilisateurs</h2>
					<h3>Modification d'un utilisateur</h3>
						<form action=\"index.php?module=admin&action=modifierUser&id_user=$user->id_user\" method= \"post\">
							<div class=\"form-group\">
								<label> Prenom : </label><input class=\"form-control\" type=\"text\" name=\"prenom\" value=\"$user->prenom\">
							</div>
							<div class=\"form-group\">
								<label> Nom : </label><input class=\"form-control\" type=\"text\" name=\"nom\" value=\"$user->nom\">
							</div>
							<div class=\"form-group\">
								<label> Âge : </label><input class=\"form-control\" type=\"text\" name=\"age\" value=\"$user->age\">
							</div>
							<div class=\"form-group\">
								<label> Sexe : 
								<label class=\"radio-inline\"><input type=\"radio\" name=\"sexe\" value=\"F\" "; if($user->sexe=='F'){echo "checked";} echo "> F </label>
								<label class=\"radio-inline\"><input type=\"radio\" name=\"sexe\" value=\"M\""; if($user->sexe=='M'){echo "checked";} echo "> M </label>
							</div>
							<div class=\"form-group\">
								<label> Téléphone : </label><input class=\"form-control\" type=\"text\" name=\"telephone\" value=\"$user->telephone\">
							</div>
							<div class=\"form-group\">
								<label> Departement : </label><select class=\"form-control\" name=\"departement\">
									<option value=\"$user->departement\">$user->departement</option>";
		foreach ($listeDepartement as $departement) {
			echo "					<option value=\"$departement->departement\">$departement->departement</option>";
		}
		echo "					</select>
							</div>
							<div class=\"form-group\">

                            <table class=\"table table-hover\">
                                <thead>
                                    <tr>
                                        <th>Sport</th>
                                        <th>Niveau</th>
    								</tr>
                                </thead>
                                <tbody>
                                ";
        $i = 0;
		foreach ($listeNiveauUser as $niveau){ 
            
            $i++;                                                               // disabled=\"disabled\"
    		echo "					<tr>
                                        <th>
                                            <input class=\"form-control\" type=\"text\" name=\"sport["; echo $i; echo "]\" value=\"$niveau->intitule\" >
                                        </th>
            							<th>
                                            <select class=\"form-control\" name=\"niveau["; echo $i; echo "]\">
            									<option value=\"debutant\""; if ($niveau->niveau == 'debutant') { echo 'selected'; } echo "> Débutant </option>
            									<option value=\"intermediaire\""; if ($niveau->niveau == 'intermediaire') { echo 'selected'; } echo "> Intermédiaire </option>
            									<option value=\"avance\""; if ($niveau->niveau == 'avance') { echo 'selected'; } echo "> Avancé </option>
                                            </select>
                                        </th>
                                    </tr>
                                    "; // GR
		};

		echo "				</tbody>
                            </table>	
							</div>
							<input class=\"btn btn-default\" type=\"submit\" value= \"Modifier l'utilisateur\">
						</form>
				</div>";
		parent::printView();
	}

	 //NIVEAU

	function listeNiveau($listeSport, $listeNiveau, $user){
        echo "  <div class=\"col-lg-offset-1 col-lg-10 \">  
            <a href=\"index.php?module=admin\"><button type=\"button\" class=\"btn btn-info\"> < Retour à l'accueil Admin</button></a>
            <h2>Administration des sports et niveaux pour les utilisateurs</h2>
            <h3><a href=\"index.php?module=admin&action=ajouterNiveauForm\">+ Ajouter un sport et niveau<a></h3>
            <table class=\"table table-hover\">
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th></th>
                        <th>Sport</th>
                        <th>Niveau</th>
                    </tr>
                </thead>
                <tbody>";
        foreach ($listeNiveau as $niveau) {
            $currentUser = $this->modeleAdmin->getUser($niveau->id_user);
            echo "  <tr>
                        <th>$currentUser->prenom</th>
                        <th>$currentUser->nom</th>
                        <th>$niveau->intitule</th>
                        <th>$niveau->niveau</th>
                        <th><a href=\"index.php?module=admin&action=supprimerNiveau&id_user=$niveau->id_user&intitule=$niveau->intitule\">Supprimer<a></th>
                    </tr>";
        }
        echo "      </tbody>            
                </table>
            </div>";

        parent::printView();

    }

    function ajouterNiveauForm($listeSport, $users){
        echo "  <div class=\"col-lg-offset-1 col-lg-10 \">
                    <a href=\"index.php?module=admin&action=listeNiveau\"><button type=\"button\" class=\"btn btn-info\"> 
                        < Retour à la liste de Sports et Niveaux</button>
                    </a>
                    <h2>Administration des sports et niveaux pour les utilisateurs</h2>
                    <h3>Ajout d'un sport et niveau</h3>";

        foreach ($users as $user){
            echo "         <form action=\"index.php?module=admin&action=ajouterNiveau&id_user=$user->id_user\" method= \"post\">";
        }
            echo "          <div class=\"form-group\">
                                <label> Utilisateur : </label>
                                    <select class=\"form-control\" name=\"user\">";
        foreach ($users as $user) {
            echo "                      <option value\"$user->id_user\">$user->prenom</option>";
            }                       
            echo "                  </select>
                            </div>
                            <div class=\"form-group\">
                                <label> Sport : </label><select class=\"form-control\" name=\"sport\">";
        
        foreach ($listeSport as $sport) {
            echo "                  <option value=\"$sport->intitule\">$sport->intitule</option>";
        }
        echo "                  </select>
                            </div>
                            <div class=\"form-group\">
                            <label> Niveau : </label>
                                <th>
                                    <select class=\"form-control\" name=\"niveau\">
                                        <option value=\"debutant\"> Débutant </option>
                                        <option value=\"intermediaire\"> Intermédiaire </option>
                                        <option value=\"avance\"> Avancé </option>
                                    </select>
                                </th>
                            </div>
                            <input class=\"btn btn-default\" type=\"submit\" value= \"Ajouter le sport et niveau\">
                        </form>
                </div>";

        parent::printView();
    }

	// OFFRE

    function modifierEtablissementService($etablissement,$listeService){
        echo "	<div class=\"col-lg-offset-1 col-lg-10 \">	
					<a href=\"index.php?module=admin&action=listeEtablissement&id_etablissement=$etablissement->id_etablissement\"><button type=\"button\" class=\"btn btn-info\"> < Retour à l'administration des établissements</button></a>
					<h2>Modification des services de l'établissement $etablissement->nom</h2>
					<h3><a href=\"index.php?module=admin&action=ajouterOffreForm&id_etablissement=$etablissement->id_etablissement\">+ Ajouter un service à l'établissement<a></h3>
					<table class=\"table table-hover\">
						<thead>
							<tr>
								<th>Service</th>
							</tr>
						</thead>
						<tbody>";
        foreach ($listeService as $service) {
            echo "		<tr> 
							<th>$service->service</th>	
							<th><a href=\"index.php?module=admin&action=supprimerOffre&id_etablissement=$service->id_etablissement&service=$service->service\">Supprimer<a></th>
						</tr>";
                    }
                
        echo "			</tbody>			
					</table>
				</div>";

        parent::printView();
    }

    function ajouterOffreForm($listeNonOffre,$etablissement){
        echo "	<div class=\"col-lg-offset-1 col-lg-10 \">
					<a href=\"index.php?module=admin&action=modifierEtablissementService&id_etablissement=$etablissement->id_etablissement\"><button type=\"button\" class=\"btn btn-info\"> < Retour à la liste des services des établissements</button></a>
					<h2>Administration des services de l'établissement $etablissement->nom</h2>
					<h3>Ajout d'un service à un établissements</h3>
						<form action=\"index.php?module=admin&action=ajouterOffre&id_etablissement=$etablissement->id_etablissement\" method= \"post\">
							<div class=\"form-group\">
							    <label> Service : </label><select class=\"form-control\" name=\"service\">";
        foreach ($listeNonOffre as $service) {
            echo "<option value=\"$service->service\">$service->service</option>";
        }
        echo"           </select>
                            </div>
							<input class=\"btn btn-default\" type=\"submit\" value= \"Ajouter le service\">
		                </form>
		         </div>";
        parent::printView();
    }

	//Dispense 
	
    function modifierEtablissementSport($etablissement,$listeDispense){
        echo "	<div class=\"col-lg-offset-1 col-lg-10 \">	
					<a href=\"index.php?module=admin&action=listeEtablissement&id_etablissement=$etablissement->id_etablissement\"><button type=\"button\" class=\"btn btn-info\"> < Retour à l'administration des établissements</button></a>
					<h2>Modification des sports de l'établissement $etablissement->nom</h2>
					<h3><a href=\"index.php?module=admin&action=ajouterDispenseForm&id_etablissement=$etablissement->id_etablissement\">+ Ajouter un sport à un établissement<a></h3>
					<table class=\"table table-hover\">
						<thead>
							<tr>
								<th>Sport</th>
								<th>Prix</th>
							</tr>
						</thead>
						<tbody>";
        foreach ($listeDispense as $dispense) {
            echo "		<tr> 
							<th>$dispense->intitule</th>
							<th>$dispense->prix</th>		
							<th><a href=\"index.php?module=admin&action=supprimerDispense&id_etablissement=$dispense->id_etablissement&sport=$dispense->intitule&prix=$dispense->prix\">Supprimer<a></th>
							<th><a href=\"index.php?module=admin&action=modifierDispenseForm&id_etablissement=$dispense->id_etablissement&sport=$dispense->intitule\">Modifier<a></th>
							<th><a href=\"index.php?module=admin&action=listeHoraireSport&id_etablissement=$dispense->id_etablissement&sport=$dispense->intitule\">Horaire<a></th>
						</tr>";
                    }
                
        echo "			</tbody>			
					</table>
				</div>";

        parent::printView();
    }

    function ajouterDispenseForm($listeNonDispense,$etablissement){
        echo "	<div class=\"col-lg-offset-1 col-lg-10 \">
					<a href=\"index.php?module=admin&action=modifierEtablissementSport&id_etablissement=$etablissement->id_etablissement\"><button type=\"button\" class=\"btn btn-info\"> < Retour à la liste des sports des établissements</button></a>
					<h2>Administration des sports de l'établissement $etablissement->nom</h2>
					<h3>Ajout d'un sport à un établissements</h3>
						<form action=\"index.php?module=admin&action=ajouterDispense&id_etablissement=$etablissement->id_etablissement\" method= \"post\">
							<div class=\"form-group\">
								<label> Prix : </label><input class=\"form-control\" type=\"text\" name=\"prix\">
							</div>
							<div class=\"form-group\">
							    <label> Sport : </label><select class=\"form-control\" name=\"sport\">";
        foreach ($listeNonDispense as $sport) {
            echo "<option value=\"$sport->intitule\">$sport->intitule</option>";
        }
        echo"           </select>
                            </div>
							<input class=\"btn btn-default\" type=\"submit\" value= \"Ajouter le sport\">
		                </form>
		         </div>";
        parent::printView();
    }

	function modifierDispenseForm($etablissement, $sport){
		echo "	<div class=\"col-lg-offset-1 col-lg-10 \">
					<a href=\"index.php?module=admin&action=modifierEtablissementSport&id_etablissement=$etablissement->id_etablissement&sport=$sport\"><button type=\"button\" class=\"btn btn-info\"> < Retour à la liste des sports de l'établissements</button></a>
					<h2>Modification des sports de l'établissement $etablissement->nom</h2>
					<h3>Modification du sport $sport</h3>
						<form action=\"index.php?module=admin&action=modifierDispense&id_etablissement=$etablissement->id_etablissement&sport=$sport\" method= \"post\">
							<div class=\"form-group\">
								<label> Prix : </label><input class=\"form-control\" type=\"text\" name=\"prix\">
							</div>
							<input class=\"btn btn-default\" type=\"submit\" value= \"Modifier le sport\">
						</form>
				</div>";				
		parent::printView();
	}

    // Propose


    function listeHoraireSport($etablissement, $sport, $listePropose){
		echo "	<div class=\"col-lg-offset-1 col-lg-10 \">	
					<a href=\"index.php?module=admin&action=modifierEtablissementSport&id_etablissement=$etablissement->id_etablissement&sport=$sport\"><button type=\"button\" class=\"btn btn-info\"> < Retour a la liste des sports de l'etablissement</button></a>	
					<h2>Horaire $sport</h2>
					<h3><a href=\"index.php?module=admin&action=ajouterHoraireForm&id_etablissement=$etablissement->id_etablissement&sport=$sport\">+ Ajouter un horaire<a></h3>
					<table class=\"table table-hover\">
						<thead>
							<tr>
								<th>Jour</th>
								<th>Heure de debut</th>
								<th>Heure de fin</th>
							</tr>
						</thead>
						<tbody>";
			foreach ($listePropose as $horaire) {
				echo "		<tr>
								<th>$horaire->jour</th>
								<th>$horaire->heure_debut</th>
								<th>$horaire->heure_fin</th>			
								<th><a href=\"index.php?module=admin&action=supprimerHoraire&id_etablissement=$etablissement->id_etablissement&sport=$sport&jour=$horaire->jour&heure_debut=$horaire->heure_debut&heure_fin=$horaire->heure_fin\">Supprimer<a></th>
							</tr>";
			}
			echo "		</tbody>			
					</table>
				</div>";
		parent::printView();
	}	

   	function ajouterHoraireForm($etablissement,$sport){
		echo "	<div class=\"col-lg-offset-1 col-lg-10 \">
					<a href=\"index.php?module=admin&action=listeHoraireSport&id_etablissement=$etablissement->id_etablissement&sport=$sport\"><button type=\"button\" class=\"btn btn-info\"> < Retour à la liste des horaire du sport</button></a>
					<h2>Ajout d'un horaire au sport $sport</h3>
						<form action=\"index.php?module=admin&action=ajouterHoraire&id_etablissement=$etablissement->id_etablissement&sport=$sport\" method= \"post\">
							<div class=\"form-group\">
								<label> Jour : </label><input class=\"form-control\" type=\"text\" name=\"jour\">
							</div>
							<div class=\"form-group\">
								<label> Heure de début : </label><input class=\"form-control\" type=\"text\" name=\"heure_debut\">
							</div>
							<div class=\"form-group\">
							    <label> Heure de fin : </label><input class=\"form-control\" type=\"text\" name=\"heure_fin\">
        					</div>
							<input class=\"btn btn-default\" type=\"submit\" value= \"Ajouter l'horaire\">
		                </form>
		         </div>";
        parent::printView();
	}
	

}
?>