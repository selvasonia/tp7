<div id="page">
	<div id="content">
		<div class="box">
		<?php
		// si la variable $_REQUEST['numart'] est vide c'est qu'il s'agit d'un nouvel artiste à créer
		if(!empty($_REQUEST['numart'])){ // si on demande une modification d'un artiste
			$lesGenres=Genre::findById($_REQUEST['numart']); 
		}
		?>
			<h2>Fiche Genre</h2>
			<section>
				<form action='index.php?uc=Genre&action=VerifForm' method='post'>
				<input type='hidden' name="idGenre" value='<?php if(!empty($_REQUEST['numart'])){echo $lesGenres->getId();}?>'>
				<label for "nomGenre">Nom du Genre</label> <input type="text" name="nomGenre" id="nomGenre" 
				value="<?php if(!empty($_REQUEST['numart'])){echo $lesGenres->getNom();} ?>">
				<input type="submit" value="<?php if(!empty($_REQUEST['numart'])){echo "Modifier le genre";}else{echo "Ajouter le genre";} ?>" />
				</form>
			</section>
		</div>
	</div>
	<br class="clearfix" />
</div>