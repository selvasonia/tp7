<?php
include("vues/v_connexion.php");
$mdp = md5($_POST['mdp']); //md5 = cryptage
$login = $_POST['login'];

$sql="SELECT mdp, login from user where login = '$login'";
$resultat=MonPdo::getInstance()->query($sql);

if($resultat->rowCount()==1){
	foreach($resultat as $row){
		if($mdp==$row[0]){
			$_SESSION['connexion']=$login;
			?><meta http-equiv="Refresh" content="0;url=index.php"><?php
		}
		else{
			echo "Mauvais mdp";
		}
	}
}
else{
	echo "Mauvais identifiant";

}

