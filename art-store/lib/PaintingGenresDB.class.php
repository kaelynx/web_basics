<?php
	
	class PaintingGenresDB {
		private static $baseSQL = "SELECT PaintingGenreID, PaintingID, GenreID FROM PaintingGenres ";
    	private static $constraint = ' order by PaintingGenreID';
    
    	public function __construct() {
    	}      

    	public function findById($id)
    	{
        	$sql = self::$baseSQL .  ' WHERE PaintingGenreID=? ';
        	$statement = DatabaseHelper::runQuery($sql, Array($id));
        	return $statement->fetch();
        
    	}
    
    	public function getAll()
    	{
        	$sql = self::$baseSQL . self::$constraint;
        	$statement = DatabaseHelper::runQuery($sql, null);
        	return $statement->fetchAll();        
    	} 
	}


?>