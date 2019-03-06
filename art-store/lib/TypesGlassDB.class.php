<?php

	class TypesGlassDB {
		private static $baseSQL = "SELECT GlassID, Title, Description, Price FROM TypesGlass ";
    	private static $constraint = ' order by GlassID';
    
    	public function __construct() {
    	}      

    	public function findById($id)
    	{
        	$sql = self::$baseSQL .  ' WHERE GlassID=? ';
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