<?php 
	
	class GenresCollection {
		private $genres = null;
    	private $g = null;

		public function __construct(){
			$this->g = new GenresDB();
			$genreEntries = $this->g->getAll();
			$this->genres = array();
			foreach($genreEntries as $gen){
			//use id as key
				$this->genres[$gen['GenreID']] = new Genres($gen);
			}
		}

		public function getGenres(){
			return $this->genres;
		}

		public function findGenresByID($id){
			return $this->genres[$id];
		}

    	public function getGenreNames($id){
        	$l = "";
            $l .= '<ul class="ui list">';
        	foreach($this->g->joinPG() as $pg){
        		if($pg['PaintingID'] == $id){
        			$l .= '<li class="item"><a href="#">';
                	$l .= $pg['GenreName'];
                	$l .= '</a></li>';
            	}
        	}
        	$l .= '</ul>';
        	return $l;
 		}
	}

?>