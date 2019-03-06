<?php

	class PaintingGenres (
  		public $PaintingGenreID; 
  		public $PaintingID;
  		public $GenreID;

  		function __construct($record){
  			$this->PaintingGenreID = $record['PaintingGenreID'];
  			$this->PaintingID = $record['PaintingID'];
  			$this->GenreID = $record['GenreID'];
  		}

  		public function getPaintingGenreID(){
  			return $this->PaintingGenreID;
  		}

  		public function getPaintingID(){
  			return $this->PaintingID;
  		}

  		public function getGenreID(){
  			return $this->GenreID;
  		}
  	}
?>