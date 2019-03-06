<?php
	
	class ReviewsDB{
		
		private static $baseSQL = "SELECT RatingID, PaintingID, ReviewDate, Rating, Comment FROM Reviews ";
    	private static $constraint = ' order by RatingID';
    
    	public function __construct() {
    	}      

    	public function findById($id)
    	{
        	$sql = self::$baseSQL .  ' WHERE RatingID=? ';
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