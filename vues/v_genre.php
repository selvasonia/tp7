
			<section>
			<?php		
			If (!empty( $_SESSION['connexion'])) // si quelqu'un est connecté
			{ ?>
			<h2></h2>
			<h2>Liste des genres</h2>
			<a class="btn" href='index.php?uc=Genre&action=ajouter'>Ajouter un genre</a>
			<table><tr><th>Numéro</th><th>Genre</th><th>actions</th></tr>
			<script>
			function supprArtiste(id) {
				if(confirm("Voulez vous vraimer supprimer ce genre ?"))
				{
					location.href='index.php?uc=Genre&action=supprimer&numart='+id;
				}
				else {
					alert("le genre n'a pas été supprimé.");
				}
			}
			</script>
			<?php 
				foreach($lesGenres as $leGenre) //parcours du tableau d'objets récupérés
				{ 	
				$id=$leGenre->getId();           
				$genre=$leGenre->getNom();
			?>
				<tr>
					<td width=5%><?php echo $id?></td><td width=80%><?php echo $genre?></td><!--affichage dans des liens-->
					<td class='action' width=15%>
						<a href='index.php?uc=Genre&action=modifier&numart=<?php echo $id ?>' class="imageModifier" title="modifier le genre"></a>
						<span class="imageSupprimer" onclick="javascript:supprArtiste('<?php echo $id ;?>')" title="supprimer le genre" ></span>
					</td>
				</tr>
			<?php
			}
			}
			else{
				echo " Vous devez vous connecté pour y accéder ";
			}
			?>
			</table>
			</section>
		</div>
	</div>
	<br class="clearfix" />
</div>


