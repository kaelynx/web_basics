<?php

class Shapes {

	public $ShapeID;
	public $ShapeName;

	function __construct($record) {
		$this->ShapeID = $record['ShapeID'];
		$this->ShapeName = $record['ShapeName'];
	}

	public function getShapeID() {
		return $this->ShapeID;
	}

	public function getShapeName() {
		return $this->ShapeName;
	}
}


?>