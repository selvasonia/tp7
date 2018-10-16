
			<section>
			<?php		
			If (!empty( $_SESSION['connexion'])) // si quelqu'un est connecté
			{ ?>
			<table><tr><th>Numéro</th><th>Titre</th><th>Année</th><th>Genre</th><th>actions</th></tr>
			<script>
			function supprArtiste(id) {
				if(confirm("Voulez vous vraimer supprimer cet album ?"))
				{
					location.href='index.php?uc=Albums&action=supprimer&numart='+id;
				}
				else {
					alert("l'artiste n'a pas été supprimé.");
				}
			}
			</script>
			<?php 
				foreach($lesAlbums as $Album) //parcours du tableau d'objets récupérés
				{ 	
				$id=$Album->getId();           
				$titre=$Album->getNom();
				$annee=$Album->getAnnee();
				$genre=$Album->getGenre();
			?>
				<tr>
					<td width=5%><?php echo $id?></td><td width=80%><?php echo $titre?></td><td><?php echo $annee?></td><td><?php echo $genre?></td><!--affichage dans des liens-->
					<td class='action' width=15%>
						<a href='index.php?uc=Albums&action=modifier&numart=<?php echo $id ?>' class="imageModifier" title="modifier l'album"></a>
						<span class="imageSupprimer" onclick="javascript:supprArtiste('<?php echo $id ;?>')" title="supprimer l'album" ></span>
					</td>
				</tr>
			<?php
				}
			?>
			<?php
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


