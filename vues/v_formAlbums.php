<div id="page">
	<div id="content">
		<div class="box">
		<?php
		// si la variable $_REQUEST['numart'] est vide c'est qu'il s'agit d'un nouvel artiste à créer
		if(!empty($_REQUEST['numart'])){ // si on demande une modification d'un artiste
			$lesAlbums=Album::findById($_REQUEST['numart']); 
		}
		?>
			<h2>Fiche Albums</h2>
			<section>
				<form action='index.php?uc=Albums&action=VerifForm' method='post'>
				<input type='hidden' name="idAlbum" value='<?php if(!empty($_REQUEST['numart'])){echo $lesAlbums->getId();}?>'>
				<label for "nomAlbum">Nom de l'album</label> <input type="text" name="nomAlbum" id="nomAlbum" 
				value="<?php if(!empty($_REQUEST['numart'])){echo $lesAlbums->getNom();} ?>">
				<input type="submit" value="<?php if(!empty($_REQUEST['numart'])){echo "Modifier l'album";}else{echo "Ajouter l'album";} ?>" />
				</form>
			</section>
		</div>
	</div>
	<br class="clearfix" />
</div>

