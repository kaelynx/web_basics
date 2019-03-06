<?php
	
	class TypesMatt {
  		public $MattID; 
  		public $Title; 
  		public $ColorCode;

  		function __construct($record){
  			$this->MattID = $record['MattID'];
  			$this->Title = $record['Title'];
  			$this->ColorCode = $record['ColorCode'];
  		}

  		public function getMattID(){
  			return $this->MattID;
  		}

  		public function getTitle(){
  			return $this->Title;
  		}

  		public function getColorCode(){
  			return $this->ColorCode;
  		}


	}


?>