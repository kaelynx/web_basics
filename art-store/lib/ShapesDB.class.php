<?php

class ShapesDB {

	private static $baseSQL = "SELECT ShapeID, ShapeName FROM Shapes ";
	private static $constraint = 'order by ShapeName';

	public function __construct() {
    }      

    public function findById($id)
    {
        $sql = self::$baseSQL .  ' WHERE ShapeID=? ';
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