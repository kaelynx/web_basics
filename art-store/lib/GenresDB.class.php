<?php
	
	class GenresDB {
		private static $baseSQL = "SELECT GenreID, GenreName, EraID, Description, Link FROM Genres ";
    	private static $constraint = ' order by GenreID';
    
    	public function __construct() {
    	}      
    
    	public function getAll()
    	{
        	$sql = self::$baseSQL . self::$constraint;
        	$statement = DatabaseHelper::runQuery($sql, null);
        	return $statement->fetchAll();        
    	} 
        
        public function joinPG(){
        //$sql = "SELECT p.PaintingID, p.ArtistID, p.Cost, p.Excerpt, p.ImageFileName, p.Title, a.FirstName, a.LastName, a.ArtistID FROM Paintings p, Artists a WHERE a.ArtistID = p.ArtistID LIMIT 30";
            $sql = "SELECT * FROM Genres NATURAL JOIN PaintingGenres";
            $statement = DatabaseHelper::runQuery($sql, null);
        //print_r($statement);
            return $statement->fetchAll(); 
        }
	}


?>