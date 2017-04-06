<?php 
if(!defined('CONST_INCLUDE'))
die('Acces direct interdit!');

require_once('VuePapa/vuePapa.php');

class VuePublic extends VuePapa{

	function __construct(){
		parent::__construct();
	}

	// Accueil public

	function accueilPublic(){
		echo "	<h1>Accueil public</h1>
				<a href=\"index.php?module=admin\"><button type=\"button\" class=\"btn btn-info\"> Vers Admin</button></a></br>
				<a href=\"index.php?action=rechercheEtablissementForm\">Recherche par établissement</a></br>
				<a href=\"index.php?action=rechercheUserForm\">Recherche par joueur</a></br>
			";
		parent::printView();
	}

	function rechercheEtablissementForm($listeDepartement, $listeSport, $listeEtablissement){ 
		echo "	<div class=\"col-lg-offset-1 col-lg-10 \">
					<a href=\"index.php\"><button type=\"button\" class=\"btn btn-info\"> < Retour à l'accueil</button></a>
					<h2>Recherche d'un sport par établissement</h2>
						<form action=\"index.php?action=rechercheEtablissement\" method= \"post\">

							<div class=\"form-group\">
								<label> Etablissement : </label><select class=\"form-control\" name=\"etablissement\">
									<option value=\"default\">-- Choisir un établissement --</option>";
		foreach ($listeEtablissement as $etablissement) {
			echo "					<option value=\"$etablissement->id_etablissement\">$etablissement->nom</option>";
		}
		echo "					</select>


							</div>

							<div class=\"form-group\">
								<label> Sport : </label><select class=\"form-control\" name=\"sport\">
								<option value=\"default\">-- Choisir un sport --</option>";
		foreach ($listeSport as $sport) {
			echo "					<option value=\"$sport->intitule\">$sport->intitule</option>";
		}
		echo "					</select>
							</div>

							<div class=\"form-group\">
								<label> Departement : </label><select class=\"form-control\" name=\"departement\">
								<option value=\"default\">-- Choisir un département --</option>";
		foreach ($listeDepartement as $departement) {
			echo "					<option value=\"$departement->departement\">$departement->departement</option>";
		}
		echo "					</select>
							</div>

							<div class=\"form-group\">
								<label> Prix (inférieur à) : </label><input class=\"form-control\" type=\"text\" name=\"prix\">
							</div>

							<div class=\"form-group\">
								<label> Jour  : </label><select class=\"form-control\" name=\"jour\">
									<option value=\"default\">-- Choisir un jour --</option>
									<option value=\"lundi\">Lundi</option>
									<option value=\"mardi\">Mardi</option>
									<option value=\"mercredi\">Mercredi</option>
									<option value=\"jeudi\">Jeudi</option>
									<option value=\"vendredi\">Vendredi</option>
									<option value=\"samedi\">Samedi</option>
									<option value=\"dimanche\">Dimanche</option>	
								</select>
							</div>

							<div class=\"form-group\">
								<label> Heure de début : </label><select class=\"form-control\" name=\"heure_debut\">
									<option value=\"default\">-- Choisir une heure de début --</option>
									<option value=\"00:00\">00h</option>
									<option value=\"01:00\">01h</option>
									<option value=\"02:00\">02h</option>
									<option value=\"03:00\">03h</option>
									<option value=\"04:00\">04h</option>
									<option value=\"05:00\">05h</option>
									<option value=\"06:00\">06h</option>
									<option value=\"07:00\">07h</option>
									<option value=\"08:00\">08h</option>
									<option value=\"09:00\">09h</option>
									<option value=\"10:00\">10h</option>
									<option value=\"11:00\">11h</option>
									<option value=\"12:00\">12h</option>
									<option value=\"13:00\">13h</option>
									<option value=\"14:00\">14h</option>
									<option value=\"15:00\">15h</option>
									<option value=\"16:00\">16h</option>
									<option value=\"17:00\">17h</option>
									<option value=\"18:00\">18h</option>
									<option value=\"19:00\">19h</option>
									<option value=\"20:00\">20h</option>
									<option value=\"21:00\">21h</option>
									<option value=\"22:00\">22h</option>
									<option value=\"23:00\">23h</option>	
								</select>
							</div>

							<div class=\"form-group\">
								<label> Heure de fin : </label><select class=\"form-control\" name=\"heure_fin\">
									<option value=\"default\">-- Choisir une heure de fin --</option>
									<option value=\"01:00\">01h</option>
									<option value=\"02:00\">02h</option>
									<option value=\"03:00\">03h</option>
									<option value=\"04:00\">04h</option>
									<option value=\"05:00\">05h</option>
									<option value=\"06:00\">06h</option>
									<option value=\"07:00\">07h</option>
									<option value=\"08:00\">08h</option>
									<option value=\"09:00\">09h</option>
									<option value=\"10:00\">10h</option>
									<option value=\"11:00\">11h</option>
									<option value=\"12:00\">12h</option>
									<option value=\"13:00\">13h</option>
									<option value=\"14:00\">14h</option>
									<option value=\"15:00\">15h</option>
									<option value=\"16:00\">16h</option>
									<option value=\"17:00\">17h</option>
									<option value=\"18:00\">18h</option>
									<option value=\"19:00\">19h</option>
									<option value=\"20:00\">20h</option>
									<option value=\"21:00\">21h</option>
									<option value=\"22:00\">22h</option>
									<option value=\"23:00\">23h</option>
									<option value=\"00:00\">00h</option>
								</select>
							</div>

							<div class=\"form-group\">
								<label> Note (supérieure ou égale): </label><input class=\"form-control\" type=\"text\" name=\"note\">
							</div>

							<div class=\"form-group\">
								<label> Classé par : </label><select class=\"form-control\" name=\"orderBy\">
									<option value=\"default\">-- Choisir un classement --</option>
									<option value=\"nom\">Etablissement</option>
									<option value=\"intitule\">Sport</option>
									<option value=\"departement\">Departement</option>
									<option value=\"prix\">Prix</option>
									<option value=\"jour\">Jour</option>
									<option value=\"heure_debut\">Heure de début</option>
									<option value=\"heure_fin\">Heure de fin</option>
									<option value=\"note\">Note</option>
								</select>
							</div>

							<div class=\"form-group\">
								<label> Croissant / Décroissant : </label><select class=\"form-control\" name=\"croissantDecroissant\">
									<option value=\"ASC\">Croissant</option>
									<option value=\"DESC\">Decroissant</option>
								</select>
							</div>

							<input class=\"btn btn-default\" type=\"submit\" value= \"Rechercher\">
						</form>
				</div>";			
		parent::printView();
	}

	function rechercheEtablissement($listeEtablissement){
		echo "	<div class=\"col-lg-offset-1 col-lg-10 \">	
					<a href=\"index.php?action=rechercheEtablissementForm\"><button type=\"button\" class=\"btn btn-info\"> < Retour à la recherche</button></a>
					<h2>Recherche par établissement</h2>
					<table class=\"table table-hover\">
						<thead>
							<tr>
								<th>Établissement</th>
								<th>Sport</th>
								<th>Adresse</th>
								<th>Ville</th>
								<th>Département</th>
								<th>Jour - Heure</th>
								<th>Prix</th>
								<th>Note (/5)</th>
							</tr>
						</thead>
						<tbody>";
			foreach ($listeEtablissement as $etablissement) {
				echo "		<tr>
								<th>$etablissement->nom</th>
								<th>$etablissement->intitule</th>
								<th>$etablissement->adresse</th>
								<th>$etablissement->ville</th>
								<th>$etablissement->departement</th>
								<th>$etablissement->jour - $etablissement->heure_debut/$etablissement->heure_fin</th>
								<th>";echo number_format($etablissement->prix, 2);echo" €</th>	
								<th>";echo number_format($etablissement->note, 1);echo"</th>
								<th><a href=\"index.php?action=noterEtablissementForm&id_etablissement=$etablissement->id_etablissement\">Noter</a></th>
							</tr>";
			}
			echo "		</tbody>			
					</table>
				</div>";

		parent::printView();
	}

	function noterEtablissementForm($etablissement){
		echo "	<div class=\"col-lg-offset-1 col-lg-10 \">
					<a href=\"index.php?action=rechercheEtablissementForm\"><button type=\"button\" class=\"btn btn-info\"> < Retour à la recherche</button></a>
					<h2>Note Etablissement</h2>
						<form action=\"index.php?action=noterEtablissement&id_etablissement=$etablissement\" method= \"post\">
							<div class=\"form-group\">
								<label> Note: </label><select class=\"form-control\" name=\"note\">
									<option value=\"1\">1</option>
									<option value=\"2\">2</option>
									<option value=\"3\">3</option>
									<option value=\"4\">4</option>
									<option value=\"5\">5</option>
								</select>
							</div>
							<input class=\"btn btn-default\" type=\"submit\" value= \"Noter !\">
						</form>
				</div>";			
		parent::printView();
	}

	function rechercheUserForm($listeDepartement, $listeSport){ 
		echo "	<div class=\"col-lg-offset-1 col-lg-10 \">
					<a href=\"index.php\"><button type=\"button\" class=\"btn btn-info\"> < Retour à l'accueil</button></a>
					<h2>Recherche d'un partenaire pour un sport</h2>
						<form action=\"index.php?action=rechercheUser\" method= \"post\">

							<div class=\"form-group\">
								<label> Sport : </label><select class=\"form-control\" name=\"sport\">
								<option value=\"default\">-- Choisir un sport --</option>";
		foreach ($listeSport as $sport) {
			echo "					<option value=\"$sport->intitule\">$sport->intitule</option>";
		}
		echo "					</select>
							</div>

							<div class=\"form-group\">
								<label> Niveau  : </label><select class=\"form-control\" name=\"niveau\">
									<option value=\"default\">-- Choisir un niveau --</option>
									<option value=\"debutant\">Débutant</option>
									<option value=\"intermediaire\">Intermédiaire</option>
									<option value=\"avance\">Avancé</option>	
								</select>
							</div>

							<div class=\"form-group\">
								<label> Departement : </label><select class=\"form-control\" name=\"departement\">
								<option value=\"default\">-- Choisir un département --</option>";
		foreach ($listeDepartement as $departement) {
			echo "					<option value=\"$departement->departement\">$departement->departement</option>";
		}
		echo "					</select>
							</div>

							<div class=\"form-group\"><label> Sexe :  </label>
								<label class=\"radio-inline\">
  									<input type=\"radio\" name=\"sexe\" value=\"F\"> Femme
								</label>
								<label class=\"radio-inline\">
  									<input type=\"radio\" name=\"sexe\" value=\"M\"> Homme
								</label>
							</div>

							<div class=\"form-group\">
								<label> Age (supérieur ou égale à) : </label><input class=\"form-control\" type=\"text\" name=\"age\">
							</div>

							

							<div class=\"form-group\">
								<label> Note (supérieure ou égale): </label><input class=\"form-control\" type=\"text\" name=\"note\">
							</div>

							<div class=\"form-group\">
								<label> Classé par : </label><select class=\"form-control\" name=\"orderBy\">
									<option value=\"default\">-- Choisir un classement --</option>
									<option value=\"intitule\">Sport</option>
									<option value=\"prenom\">Prenom</option>
									<option value=\"nom\">Nom</option>
									<option value=\"niveau\">Niveau</option>
									<option value=\"age\">Age</option>
									<option value=\"sexe\">Sexe</option>
									<option value=\"departement\">Departement</option>
									<option value=\"note\">Note</option>
								</select>
							</div>

							<div class=\"form-group\">
								<label> Croissant / Décroissant : </label><select class=\"form-control\" name=\"croissantDecroissant\">
									<option value=\"ASC\">Croissant</option>
									<option value=\"DESC\">Decroissant</option>
								</select>
							</div>

							<input class=\"btn btn-default\" type=\"submit\" value= \"Rechercher\">
						</form>
				</div>";			
		parent::printView();
	}
	
	function rechercheUser($listeUser){
		echo "	<div class=\"col-lg-offset-1 col-lg-10 \">	
					<a href=\"index.php?action=rechercheUserForm\"><button type=\"button\" class=\"btn btn-info\"> < Retour à la recherche</button></a>
					<h2>Recherche par partenaire</h2>
					<table class=\"table table-hover\">
						<thead>
							<tr>
								<th>Prénom</th>
								<th>Nom</th>
								<th>Sport</th>
								<th>Niveau</th>
								<th>Age</th>
								<th>Sexe</th>
								<th>Telephone</th>
								<th>Departement</th>
								<th>Note (/5)</th>
							</tr>
						</thead>
						<tbody>";
			foreach ($listeUser as $user) {
				echo "		<tr>
								<th>$user->prenom</th>
								<th>$user->nom</th>
								<th>$user->intitule</th>
								<th>$user->niveau</th>
								<th>$user->age</th>
								<th>$user->sexe</th>
								<th>$user->telephone</th>
								<th>$user->departement</th>
								<th>";echo number_format($user->note, 1);echo"</th>
								<th><a href=\"index.php?action=noterUserForm&id_user=$user->id_user\">Noter</a></th>
							</tr>";
			}
			echo "		</tbody>			
					</table>
				</div>";

		parent::printView();
	}

	function noterUserForm($user){
		echo "	<div class=\"col-lg-offset-1 col-lg-10 \">
					<a href=\"index.php?action=rechercheUserForm\"><button type=\"button\" class=\"btn btn-info\"> < Retour à la recherche</button></a>
					<h2>Note Joueur</h2>
						<form action=\"index.php?action=noterUser&id_user=$user\" method= \"post\">
							<div class=\"form-group\">
								<label> Note: </label><select class=\"form-control\" name=\"note\">
									<option value=\"1\">1</option>
									<option value=\"2\">2</option>
									<option value=\"3\">3</option>
									<option value=\"4\">4</option>
									<option value=\"5\">5</option>
								</select>
							</div>
							<input class=\"btn btn-default\" type=\"submit\" value= \"Noter !\">
						</form>
				</div>";			
		parent::printView();
	}



}
?>