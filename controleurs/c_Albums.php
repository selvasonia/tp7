<?php
$action = $_REQUEST['action']; //récupération de l'action
//echo "action:".$action;
switch($action)
{ 
	case 'all': //pour afficher tous les albums
		{
			$lesAlbums=Album::getAll(); //on fait appel  à la méthode d"accès aux données de la classe Album
			include("vues/v_albums.php");//puis on affiche la vue qui utilise les données
			break;
		}
	case 'artiste': //on vient de choisir un artiste on est repassé par index
		{
		//on fait appel à la méthode getAlbums d'Artist avec le numéro d'artiste
		//on inclut la vue v_albArt qui affiche les albums
		$Artiste=Artist::findById($_REQUEST['numart']); // recherche l'artiste
		$lesAlbums=$Artiste->getAlbums();
		include("vues/v_albumsPourArtiste.php");//puis on affiche la vue qui utilise les données
		break;
		}
	case 'recherchalbum': include("vues/v_rechalb.php");
						  if(!empty($_POST['rechal']))
						  {
							$lesAlbums=Album::RecherchAlbum($_POST['rechal']);// récupère l'artiste recherché
							include("vues/v_albums.php"); // on appelle la vue artiste pour les afficher
						  }
						  break;
	case 'supprimer' :
					Album::supprimerAlbum($_REQUEST['numart']);
					header("refresh: 0;url=index.php?uc=Albums&action=all");
					
					break;
	case 'modifier' : 
					include("vues/v_formAlbums.php");
					break;
	case 'VerifForm' :	
					if(!empty($_POST['idAlbum'])) // s'il s'agit d'une modification
					{
						Album::modifierAlbum($_POST['idAlbum'],$_POST['nomAlbum']);
						header("refresh: 0;url=index.php?uc=Albums&action=all");
					}
					else // s'il s'agit d'un ajout
					{
						 Album::ajouterAlbum($_POST['nomAlbum']);
						header("refresh: 0;url=index.php?uc=Albums&action=all");
					}
					break;
	
	default:echo "rien";
	}
	?>
