<?php

class SubjectTableGateway extends TableDataGateway
{ 
   public function __construct($dbAdapter) 
   {
      parent::__construct($dbAdapter);
   }

   protected function getDomainObjectClassName()  
   {
      return "Subject";
   } 
   protected function getTableName()
   {
      return "Subjects";
   }
   protected function getOrderFields() 
   {
      return 'SubjectName';
   }
   
   protected function getPrimaryKeyName() {
      return "SubjectID";
   }

   public function findForPainting($paintingId) {
      $sql = "SELECT Subjects.SubjectID as SubjectID, SubjectName FROM Subjects INNER JOIN PaintingSubjects ON Subjects.SubjectID = PaintingSubjects.SubjectID WHERE PaintingSubjects.PaintingID=?";

      //$sql = "SELECT Genres.GenreID as GenreID, GenreName, EraID, Description, Link FROM Genres INNER JOIN PaintingGenres ON Genres.GenreID = PaintingGenres.GenreID WHERE PaintingGenres.PaintingID=?";

      $result = $this->dbAdapter->fetchAsArray($sql, Array($paintingId));    

      return $this->convertRecordsToObjects($result); 
   }
}


?>