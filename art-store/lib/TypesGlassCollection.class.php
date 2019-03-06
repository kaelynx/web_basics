<?php

	class TypesGlassCollection {
		private $tGlass = null;
    	private $g = null;

		public function __construct(){
			$g = new TypesGlassDB();
			$typeEntries = $g->getAll();
			$this->tGlass = array();
			foreach($typeEntries as $tg){
			//use id as key
				$this->tGlass[$tg['GlassID']] = new TypesGlass($tg);
			}
		}

		public function getTypesGlass(){
			return $this->tGlass;
		}

		public function findTypesGlassByID($id){
			return $this->tGlass[$id];
		}

		public function typesGlassDropdown() {

			$l = "";
			$l .= '<select id="glass" class="ui search dropdown"><option value="">None</option>';
			foreach($this->getTypesGlass() as $type){
				$l .= '<option name="GlassID" value="'.$type->getGlassID().'">';
				$l .= $type->getTitle();
				$l .= '</option>';
			}
			$l .= '</select>';
			return $l;

    	}

	}


?>