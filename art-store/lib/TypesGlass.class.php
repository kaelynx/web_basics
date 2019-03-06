<?php

	class TypesGlass {
		public $GlassID;
  		public $Title;
  		public $Description;
  		public $Price; 
		

  		function __construct($record){
  			$this->GlassID = $record['GlassID'];
  			$this->Title = $record['Title'];
  			$this->Description = $record['Description'];
  			$this->Price = $record['Price'];
  		}

  		public function getGlassID(){
  			return $this->GlassID;
  		}

  		public function getTItle(){
  			return $this->Title;
  		}

  		public function getDescription(){
  			return $this->Description;
  		}

  		public function getPrice(){
  			return $this->Price;
  		}
	}

?>