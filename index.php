<?php
session_start();
require_once("modeles/monPdo.php");
require_once("function.inc.php");
require_once("modeles/entity.class.php");
require_once("modeles/Artist.class.php");
require_once("modeles/Album.class.php");
require_once("modeles/genre.class.php");


include("vues/v_entete.php") ;//bandeau en-tête
include("vues/v_menu.php") ;//menu

if(!isset($_REQUEST['uc']))  // si le contrôleur n'est pas défini (donc première venue sur le site
     $uc = 'accueil';        //on lui affecte accueil
else
	$uc = $_REQUEST['uc'];   //sinon on récupère le contrôleur

switch($uc) //suivant le contrôleur dans uc
{
	case 'accueil':
		include("vues/v_accueil.php");  //page d'accueil
		break;
		
	case 'Artistes' :                               //on va au contrôleur secondaire c_voirAlbums
		 include("controleurs/c_Artistes.php");
		 break; 
		 
	 case 'RechercheArtiste':
		include("controleurs/c_Artistes.php");	//recherche d'un auteur
		break;
		
	case 'Albums' :                               //on va au contrôleur secondaire c_voirAlbums
		 include("controleurs/c_Albums.php");
		 break;
	
	case 'RechercheAlbums':
		include("controleurs/c_Albums.php");	//recherche d'un album
		break;
	case 'Genre': include("controleurs/c_Genre.php");	
		break;
	case 'administrer' : include("controleurs/c_Administrer.php");	
						 break;
}
include("vues/v_pied.php") ;// pied de site
?>



	
