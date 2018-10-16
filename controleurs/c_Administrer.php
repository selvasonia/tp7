<?php
$action = $_REQUEST['action']; 
switch($action)
{ 
	case 'connexion': 
		{
			include("vues/v_connexion.php");
			break;
		}
	case 'deconnexion': 
		{
			include("vues/v_deconnexion.php");
			break;
		}
	case 'verifConnexion': include("vues/v_formConnexion.php");
						  break;
	default: echo "rien";
	}
	?>
