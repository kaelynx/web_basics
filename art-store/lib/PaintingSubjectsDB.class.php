<?php

	class PaintingSubjectsDB {
		private static $baseSQL = "SELECT PaintingSubjectID, PaintingID, SubjectID FROM PaintingSubjects ";
    	private static $constraint = ' order by PaintingSubjectID';
    
    	public function __construct() {
    	}      

    	public function findById($id)
    	{
        	$sql = self::$baseSQL .  ' WHERE PaintingSubjectID=? ';
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