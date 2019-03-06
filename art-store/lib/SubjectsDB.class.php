<?php
	
	class SubjectsDB {
		
		private static $baseSQL = "SELECT SubjectID, SubjectName FROM Subjects ";
    	private static $constraint = ' order by SubjectID';
    
    	public function __construct() {
    	}      

    	public function findById($id)
    	{
        	$sql = self::$baseSQL .  ' WHERE SubjectID=? ';
        	$statement = DatabaseHelper::runQuery($sql, Array($id));
        	return $statement->fetch();
        
    	}
    
    	public function getAll()
    	{
        	$sql = self::$baseSQL . self::$constraint;
        	$statement = DatabaseHelper::runQuery($sql, null);
        	return $statement->fetchAll();        
    	}   

        public function joinSub(){
        //$sql = "SELECT p.PaintingID, p.ArtistID, p.Cost, p.Excerpt, p.ImageFileName, p.Title, a.FirstName, a.LastName, a.ArtistID FROM Paintings p, Artists a WHERE a.ArtistID = p.ArtistID LIMIT 30";
            $sql = "SELECT * FROM Subjects NATURAL JOIN PaintingSubjects";
            $statement = DatabaseHelper::runQuery($sql, null);
        //print_r($statement);
            return $statement->fetchAll(); 
        }
	}


?>