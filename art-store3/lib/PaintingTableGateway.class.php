<?php

class PaintingTableGateway extends TableDataGateway
{ 
   public function __construct($dbAdapter) 
   {
      parent::__construct($dbAdapter);
   }

   protected function getDomainObjectClassName()  
   {
      return "Painting";
   } 
   protected function getTableName()
   {
      return "Paintings";
   }
   protected function getOrderFields() 
   {
     return 'PaintingID';
   }
   
   protected function getPrimaryKeyName() {
      return "PaintingID";
   }

   public function findByID($pId){

      $sql = "SELECT * FROM Paintings INNER JOIN Artists ON Paintings.ArtistID = Artists.ArtistID WHERE Paintings.PaintingID=?";

   	$result = $this->dbAdapter->fetchRow($sql, Array($pId));    

    return $this->convertRowToObject($result); 	

   }

   public function getAllByArtist($artistId) {

   		//$sql = "SELECT * FROM Paintings WHERE ArtistID=?";
   	  //$sql = "SELECT Subjects.SubjectID as SubjectID, SubjectName FROM Subjects INNER JOIN PaintingSubjects ON Subjects.SubjectID = PaintingSubjects.SubjectID WHERE PaintingSubjects.PaintingID=?";

      $sql = "SELECT * FROM Paintings INNER JOIN Artists ON Paintings.ArtistID = Artists.ArtistID WHERE Artists.ArtistID=?";

      	$result = $this->dbAdapter->fetchAsArray($sql, Array($artistId));    

      	return $this->convertRecordsToObjects($result); 
   }

   public function  getAllByGallery($galleryId) {

      $sql = "SELECT * FROM Paintings INNER JOIN Artists ON Paintings.ArtistID = Artists.ArtistID WHERE Paintings.GalleryID=?";

      	$result = $this->dbAdapter->fetchAsArray($sql, Array($galleryId));    

      	return $this->convertRecordsToObjects($result); 
   }

   public function  getAllByShape($shapeId) {

      $sql = "SELECT * FROM Paintings INNER JOIN Artists ON Paintings.ArtistID = Artists.ArtistID WHERE Paintings.ShapeID=?";

      	$result = $this->dbAdapter->fetchAsArray($sql, Array($shapeId));    

      	return $this->convertRecordsToObjects($result); 
   }

   public function  getAllByGenre($genreId) {

      $sql = "SELECT * FROM Paintings INNER JOIN PaintingGenres ON Paintings.PaintingID = PaintingGenres.PaintingID WHERE PaintingGenres.GenreID=?";

      	$result = $this->dbAdapter->fetchAsArray($sql, Array($genreId));    

      	return $this->convertRecordsToObjects($result); 
   }

   public function  getGallery($id) {

      $sql = "SELECT * FROM Paintings INNER JOIN Galleries ON Paintings.GalleryID = Galleries.GalleryID WHERE Paintings.PaintingID=?";

         $result = $this->dbAdapter->fetchAsArray($sql, Array($id));    

         return $this->convertRecordsToObjects($result); 
   } 

}

?>