<?php

	class SubjectsCollection {
		
		private $subjects = null;
    	private $s = null;

		public function __construct(){
			$this->s = new SubjectsDB();
			$subjectEntries = $this->s->getAll();
			$this->subjects = array();
			foreach($subjectEntries as $sub){
			//use id as key
				$this->subjects[$sub['SubjectID']] = new Subjects($sub);
			}
		}

		public function getSubjects(){
			return $this->subjects;
		}

		public function findSubjectByID($id){
			return $this->subjects[$id];
		}

    	public function getSubjectNames($id){
        	$l = "";
            $l .= '<ul class="ui list">';
        	foreach($this->s->joinSub() as $pg){
        		if($pg['PaintingID'] == $id){
        			$l .= '<li class="item"><a href="#">';
                	$l .= $pg['SubjectName'];
                	$l .= '</a></li>';
            	}
        	}
        	$l .= '</ul>';
        	return $l;
 		}

	}


?>