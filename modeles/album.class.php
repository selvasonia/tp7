<?php
class Album extends Entity{
    private $annee;
    private $genre;
    private $artiste;

    public function getAnnee()
    {
        return $this->annee;
    }
    public function setAnnee($value)
    {
        if(!is_numeric($value))
        { throw new Exception("l'année doit être un nombre.");
        }
        $this->annee=$value;
    }

    public function getArtiste()
    {
        return $this->artiste;
    }
    public function setArtiste($value)
    {
        $this->artiste=$value;
    }

    public function getGenre()
    {
        return $this->genre;
    }
    public function setGenre($value)
    {
        $this->genre=$value;
    }
    public function __toString()
    {
        return "informations sur l'album : <br>". parent::__toString();
    }

    public static function getAll()
    {
        $sql="SELECT * FROM album " ;
		
        $resultat=MonPdo::getInstance()->query($sql);
        $lesAlbums=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Album'); 
        
		return  $lesAlbums;
    }

    public static function ajouterAlbum($nom,$annee,$genre,$artist)
    {
        // a compléter
    }
    public static function supprimerAlbum($id)
    {
        $sql="delete from album where id= :id " ;
		//debug($id);
        $resultat=MonPdo::getInstance()->prepare($sql);
        $resultat->bindParam(':id', $id);
        $resultat->execute();
	}
	
	public static function modifierAlbum($id,$nom)
    {
		// a completer 
        $sql="update album set nom= :nom where id= :id" ;
        $resultat=MonPdo::getInstance()->prepare($sql); // prépare la requête
		$resultat->bindParam(':nom', $nom);
        $resultat->bindParam(':id', $id);
		$resultat->execute(); // applique le paramètre
    }
	
    public static function findById($id)
    {
        $sql="SELECT * FROM album where id= ?" ;
        $resultat=MonPdo::getInstance()->prepare($sql); // prépare la requête
        $resultat->execute(array($id)); // applique le paramètre
        $leArtist=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Album");
        return $leArtist[0];
    }
    
	// récupère les albums recherché
	public static function RecherchAlbum($nom)
    {
        $sql="SELECT * FROM album where nom like '%". $nom."%'";
        $resultat=MonPdo::getInstance()->query($sql);
        $lesAlbums=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Album');
        return $lesAlbums;
    }
}