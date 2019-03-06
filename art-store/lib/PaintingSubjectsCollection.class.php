<?php

	class PaintingSubjectsCollection {
		private $pSubjects = null;
    	private $ps = null;

		public function __construct(){
			$ps = new PaintingSubjectsDB();
			$psEntries = $ps->getAll();
			$this->pSubjects = array();
			foreach($psEntries as $psc){
			//use id as key
				$this->pSubjects[$psc['PaintingSubjectID']] = new PaintingSubjects($psc);
			}
		}

		public function getPaintingSubjects(){
			return $this->pSubjects;
		}

		public function findPaintingSubjectsByID($id){
			return $this->pSubjects[$id];
		}
	}

?>