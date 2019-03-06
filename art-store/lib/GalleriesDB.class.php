<?php
class GalleriesDB 
{      
    private static $baseSQL = "SELECT GalleryID, GalleryName, GalleryNativeName, GalleryCity, GalleryCountry, Latitude, Longitude, GalleryWebSite FROM Galleries ";
    private static $constraint = ' order by GalleryName';
    
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