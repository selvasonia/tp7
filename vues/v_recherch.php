
<?php
If (!empty( $_SESSION['connexion'])) // si quelqu'un est connecté
{ 
?>
<form method="POST" action="">
</br>
<p> Auteur recherché: <input type="text" name="rechaut"/></p>
<input type="submit" name="envoyer" value="Envoyer"/>
</form>
<?php
}
else{
	echo " Vous devez vous connecté pour y accéder ";
}
?>
	
	
	
