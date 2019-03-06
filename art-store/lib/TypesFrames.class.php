<?php

	class TypesFrames {

		public $FrameID;
		public $Title;
		public $Price;
		public $Color;
  		public $Syle;

  		function __construct($record){
  			$this->FrameID = $record['FrameID'];
  			$this->Title = $record['Title'];
  			$this->Price = $record['Price'];
  			$this->Color = $record['Color'];
  			$this->Syle = $record['Syle'];
  		}

   		public function getFrameID(){
  			return $this->FrameID;
  		}

  		public function getTItle(){
  			return $this->Title;
  		}

  		public function getPrice(){
  			return $this->Price;
  		}

  		public function getColor(){
  			return $this->Color;
  		}

   		public function getSyle(){
  			return $this->Syle;
  		}
	}


?>