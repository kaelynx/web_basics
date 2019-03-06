<?php

	class Reviews{
		public $RatingID;
  		public $PaintingID;
  		public $ReviewDate;
  		public $Rating; 
 		public $Comment;

 		function __construct($record){
 			$this->RatingID = $record['RatingID'];
 			$this->PaintingID = $record['PaintingID'];
 			$this->ReviewDate = $record['ReviewDate'];
 			$this->Rating = $record['Rating'];
 			$this->Comment = $record['Comment'];
 		} 

 		public function getRatingID(){
 			return $this->RatingID;
 		}

 		public function getPaintingID(){
 			return $this->PaintingID;
 		}

 		public function getReviewDate(){
 			return $this->ReviewDate;
 		}

 		public function getRating(){
 			return $this->Rating;
 		}

 		public function getComment(){
 			return $this->Comment;
 		}
	}


?>