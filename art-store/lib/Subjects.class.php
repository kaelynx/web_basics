<?php 
class Subjects {

	public $SubjectID;
  	public $SubjectName;

  	function __construct($record){
  		$this->SubjectID = $record['SubjectID'];
  		$this->SubjectName = $record['SubjectName'];
  	}

  	public function getSubjectID(){
  		return $this->SubjectID;
  	}

  	public function getSubjectName(){
  		return $this->SubjectName;
  	}
}


?>