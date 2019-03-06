<?php

	class PaintingGenresCollection {
		private $pGenres = null;
    	private $pg = null;

		public function __construct(){
			$pg = new PaintingGenresDB();
			$pGenreEntries = $pg->getAll();
			$this->pGenres = array();
			foreach($pGenreEntries as $pge){
			//use id as key
				$this->pGenres[$pge['PaintingGenreID']] = new PaintingGenres($pge);
			}
		}

		public function getPaintingGenres(){
			return $this->pGenres;
		}

		public function findPaintingGenresByID($id){
			return $this->pGenres[$id];
		}
	}

?>