<?php
$action = $_REQUEST['action']; //récupération de l'action
//echo "action:".$action;
switch($action)
{ 
	case 'all': //pour afficher tous les genre
		{
			$lesGenres=Genre::getAll(); 
			include("vues/v_genre.php");
			break;
		}
	case 'supprimer' :
					Genre::supprimerGenre($_REQUEST['numart']);
					header("refresh: 0;url=index.php?uc=Genre&action=all");
					
					break;
	case 'modifier' : 
				include("vues/v_formGenre.php");
				break;
	case 'VerifForm' :	
					if(!empty($_POST['idGenre'])) // s'il s'agit d'une modification
					{
						Genre::modifierGenre($_POST['idGenre'],$_POST['nomGenre']);
						header("refresh: 0;url=index.php?uc=Genre&action=all");
					}
					else // s'il s'agit d'un ajout
					{
						 Genre::ajouterGenre($_POST['nomGenre']);
						header("refresh: 0;url=index.php?uc=Genre&action=all");
					}
					break;
	case 'ajouter' :
					include("vues/v_formGenre.php");
					break;
					
	default:echo "rien";
	}
	?>
