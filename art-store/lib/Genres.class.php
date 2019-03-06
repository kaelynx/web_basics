  <?php 

  	class Genres {
  		public $GenreID;
  		public $GenreName;
  		public $EraID;
  		public $Description;
  		public $Link;

  		function __construct($record){
  			$this->GenreID = $record['GenreID'];
  			$this->GenreName = $record['GenreName'];
  			$this->EraID = $record['EraID'];
  			$this->Description = $record['Description'];
  			$this->Link = $record['Link'];
  		}

  		public function getGenreID(){
  			return $this->GenreID;
  		}

  		public function getGenreName(){
  			return $this->GenreName;
  		}

  		public function getEraID(){
  			return $this->EraID;
  		}

  		public function getDescription(){
  			return $this->Description;
  		}

  		public function getLink(){
  			return $this->Link;
  		}
	}

  ?>