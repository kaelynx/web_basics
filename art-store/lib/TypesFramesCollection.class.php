<?php

	class TypesFramesCollection {
		private $tFrame = null;
    	private $f = null;

		public function __construct(){
			$f = new TypesFramesDB();
			$typeEntries = $f->getAll();
			$this->tFrame = array();
			foreach($typeEntries as $tf){
			//use id as key
				$this->tFrame[$tf['FrameID']] = new TypesFrames($tf);
			}
		}

		public function getTypesFrames(){
			return $this->tFrame;
		}

		public function findTypesFramesByID($id){
			return $this->tFrame[$id];
		}

		public function typesFramesDropdown() {

			$l = "";
			$l .= '<select id="frame" class="ui search dropdown"><option value="">None</option>';
			foreach($this->getTypesFrames() as $type){
				$l .= '<option name="FrameID" value="'.$type->getFrameID().'">';
				$l .= $type->getTitle();
				$l .= '</option>';
			}
			$l .= '</select>';
			return $l;

    	}

	}

?>