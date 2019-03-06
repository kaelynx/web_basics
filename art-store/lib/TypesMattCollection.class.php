<?php

	class TypesMattCollection {
		private $tMatt = null;
    	private $m = null;

		public function __construct(){
			$m = new TypesMattDB();
			$typeEntries = $m->getAll();
			$this->tMatt = array();
			foreach($typeEntries as $tm){
			//use id as key
				$this->tMatt[$tm['MattID']] = new TypesMatt($tm);
			}
		}

		public function getTypesMatt(){
			return $this->tMatt;
		}

		public function findTypesMattByID($id){
			return $this->tMatt[$id];
		}

		public function typesMattDropdown() {

			$l = "";
			$l .= '<select id="matt" class="ui search dropdown"><option value="">None</option>';
			foreach($this->getTypesMatt() as $type){
				$l .= '<option name="MattID" value="'.$type->getMattID().'">';
				$l .= $type->getTitle();
				$l .= '</option>';
			}
			$l .= '</select>';
			return $l;

    	}

	}


?>