<?php

	class TypesFramesDB {
		private static $baseSQL = "SELECT FrameID, Title, Price, Color, Syle FROM TypesFrames ";
    	private static $constraint = ' order by FrameID';
    
    	public function __construct() {
    	}      

    	public function findById($id)
    	{
        	$sql = self::$baseSQL .  ' WHERE FrameID=? ';
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