<?php
class Genre extends Entity{

    public static function getAll()
    {
        $sql="SELECT * FROM genre " ;
        $resultat=MonPdo::getInstance()->query($sql);
        $lesGenres=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Genre'); 
        return  $lesGenres;
    }

    public static function ajouterGenre($id,$genre)
    {
		$sql="insert into genre values('', :nom )" ;
        $resultat=MonPdo::getInstance()->prepare($sql);
        $resultat->bindParam(':nom', $nom);
        $resultat->execute();    }
		
    public static function supprimerGenre($id)
    {
        $sql="delete from genre where id= :id " ;
		//debug($id);
        $resultat=MonPdo::getInstance()->prepare($sql);
        $resultat->bindParam(':id', $id);
        $resultat->execute();
		
    }
	
	public static function modifierGenre($id,$nom)
    {
		// a completer 
        $sql="update genre set nom= :nom where id= :id" ;
        $resultat=MonPdo::getInstance()->prepare($sql); // prépare la requête
		$resultat->bindParam(':nom', $nom);
        $resultat->bindParam(':id', $id);
		$resultat->execute(); // applique le paramètre
    }
    public static function findById($id)
    {
        $sql="SELECT * FROM genre where id= ?" ;
        $resultat=MonPdo::getInstance()->prepare($sql); // prépare la requête
        $resultat->execute(array($id)); // applique le paramètre
        $leArtist=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Genre");
        return $leArtist[0];    }
    

}