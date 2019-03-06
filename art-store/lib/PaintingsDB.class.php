<?php

class PaintingsDB {
	private static $baseSQL = "SELECT PaintingID, ArtistID, GalleryID, ImageFileName, Title, ShapeID, MuseumLink, AccessionNumber, CopyrightText, Description, Excerpt, YearOfWork, Width, Height, Medium, Cost, MSRP, GoogleLink, GoogleDescription, WikiLink FROM Paintings ";
    private static $constraint = ' Order by ArtistID LIMIT 30 ';

    public function __construct() {
    }      

    public function getAll()
    {
        $sql = self::$baseSQL . self::$constraint;
        $statement = DatabaseHelper::runQuery($sql, null);
        return $statement->fetchAll();        
    } 

    public function joinArtist(){
    	//$sql = "SELECT p.PaintingID, p.ArtistID, p.Cost, p.Excerpt, p.ImageFileName, p.Title, a.FirstName, a.LastName, a.ArtistID FROM Paintings p, Artists a WHERE a.ArtistID = p.ArtistID LIMIT 30";
        $sql = "SELECT * FROM Paintings NATURAL JOIN Artists LIMIT 30";
        $statement = DatabaseHelper::runQuery($sql, null);
        return $statement->fetchAll(); 
    }

    public function JoinForName($id){
        $sql = "SELECT a.FirstName, a.LastName, p.PaintingID FROM Paintings p, Artists a WHERE a.ArtistID = p.ArtistID AND p.PaintingID = $id ";
        $statement = DatabaseHelper::runQuery($sql, null);
        return $statement->fetchAll(); 
    }

    public function joinGallery(){
        $sql = "SELECT * FROM Paintings NATURAL JOIN Galleries";
        $statement = DatabaseHelper::runQuery($sql, null);
        //print_r($statement);
        return $statement->fetchAll(); 
    }

    public function byFilter(/*$t, $t1, $t3*/){
        if($_POST){
        $byID = /*$t3;//*/$_POST['test3'];
        $byGallery = /*$t1;//*/$_POST['test1'];
        $byShape = /*$t;//*/$_POST['test'];
        }

        $query = "SELECT * FROM Paintings NATURAL JOIN ARTISTS";

        $constraints = array();

        if(!empty($byID)){
            $constraints[] = 'ArtistID= ' .$byID;
        }
        if(!empty($byGallery)){
            $constraints[] = 'GalleryID= ' . $byGallery;
        }
        if(!empty($byShape)){
            $constraints[] = 'ShapeID=' . $byShape;
        }

        $sql = $query;

        if (count($constraints) > 0) {
          $sql .= ' WHERE ' . implode(' AND ', $constraints);
          $sql .= ' LIMIT 30';
        }

        $statement = DatabaseHelper::runQuery($sql, null);
        return $statement->fetchAll();  
    }


}




?>