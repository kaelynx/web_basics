<?php
class ArtStoreEngine{
	
	private $artCollection = null;
	private $galCollection = null;
	private $shapeCollection = null;
	private $paintCollection = null;
	private $typesMCollection = null;
	private $typesGCollection = null;
	private $typesFCollection = null;
	private $reviewCollection = null;
	private $genCollection = null;
	private $subCollection = null;
   
	public function __construct(){
		$this->artCollection = new ArtistCollection();
		$this->galCollection = new GalleriesCollection();
		$this->shapeCollection = new ShapesCollection();
		$this->paintCollection = new PaintingsCollection();
		$this->typesMCollection = new TypesMattCollection();
		$this->typesGCollection = new TypesGlassCollection();
		$this->typesFCollection = new TypesFramesCollection();
		$this->reviewCollection = new ReviewsCollection();
		$this->genCollection = new GenresCollection();
		$this->subCollection = new SubjectsCollection();
	}
    
	public function getArtistCollection(){
		return $this->artCollection;
	}

	public function getGalleriesCollection(){
		return $this->galCollection;
	}

	public function getShapesCollection(){
		return $this->shapeCollection;
	}

	public function getPaintingsCollection(){
		return $this->paintCollection;
	}

	public function getTypesMattCollection(){
		return $this->typesMCollection;
	}

	public function getTypesGlassCollection(){
		return $this->typesGCollection;
	}

	public function getTypesFramesCollection(){
		return $this->typesFCollection;
	}

	public function getReviewsCollection(){
		return $this->reviewCollection;
	}

	public function getGenresCollection(){
		return $this->genCollection;
	}

	public function getSubjectsCollection(){
		return $this->subCollection;
	}

}
?>