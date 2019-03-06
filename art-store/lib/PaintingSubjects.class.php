<?php

	class PaintingSubjects (
		public $PaintingSubjectID;
		public $PaintingID;
		public $SubjectID;

		function __construct($record){
			$this->PaintingSubjectID = $record['PaintingSubjectID'];
			$this->PaintingID = $record['PaintingID'];
			$this->SubjectID = $record['SubjectID'];
		} 

		public function getPaintingSubjectID(){
			return $this->PaintingSubjectID;
		}

		public function getPaintingID(){
			return $this->PaintingID;
		}

		public function getSubjectID(){
			return $this->SubjectID;
		}
  }

?>