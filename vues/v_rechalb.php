<?php
If (!empty( $_SESSION['connexion'])) // si quelqu'un est connecté
{ 
?>
<form method="POST" action="index.php?uc=Albums&action=recherchalbum">
</br>
<p> Album recherché: <input type="text" name="rechal"/></p>
<input type="submit" name="envoyer" value="Envoyer"/>
</form>
<?php
}
else{
	echo " Vous devez vous connecté pour y accéder ";
}
?>