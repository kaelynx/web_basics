<?php
/*
   Handles database access for the Artist table. 

 */
class ArtistDB 
{      
    private static $baseSQL = "SELECT ArtistID, FirstName, LastName, Nationality, Gender, YearOfBirth, YearOfDeath, Details, ArtistLink FROM Artists ";
    private static $constraint = ' order by LastName';
    
    public function __construct() {
    }      
    
    public function getAll()
    {
        $sql = self::$baseSQL . self::$constraint;
        $statement = DatabaseHelper::runQuery($sql, null);
        return $statement->fetchAll();        
    }    

}

?>