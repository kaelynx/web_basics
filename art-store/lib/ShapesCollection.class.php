<?php
class ShapesCollection {

	private $shapes = null;
    private $s = null;

	public function __construct(){
		$s = new ShapesDB();
		$shapeEntries = $s->getAll();
		$this->shapes = array();
		foreach($shapeEntries as $sh){
			//use id as key
			$this->shapes[$sh['ShapeID']] = new Shapes($sh);
		}
	}

	public function getShapes(){
		return $this->shapes;
	}

	public function findShapeByID($id){
		return $this->shapes[$id];
	}

    public function shapesDropdown() {
    	$l = "";
    	$l .= '<select class="ui fluid dropdown" name="test"><option value="">Select Shape</option>'; 
        foreach($this->getShapes() as $shape){
            $l .= '<option name="ShapeID" value="'.$shape->getShapeID().'">';
            $l .= utf8_encode($shape->getShapeName()); 
            $l .= '</option>';

        }
        $l .= '</select>';
            //print_r($l);
        return utf8_encode($l);
    }
}


?>