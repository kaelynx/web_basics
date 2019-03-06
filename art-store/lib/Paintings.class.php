<?php

class Paintings {
  public $paintingID; 
 	public $ArtistID;
  public $GalleryID;
 	public $ImageFileName; 
 	public $Title;
 	public $ShapeID;
 	public $MuseumLink;
 	public $AccessionNumber;
 	public $CopyrightText;
 	public $Description;
 	public $Excerpt;
 	public $YearOfWork;
 	public $Width;
 	public $Height;
  public $Medium;
  public $Cost;
  public $MSRP;
  public $GoogleLink;
  public $GoogleDescription; 
  public $WikiLink;

  	function __construct($record){
      $this->paintingID = $record['PaintingID'];
      $this->ArtistID = $record['ArtistID'];
      $this->GalleryID = $record['GalleryID'];
      $this->ImageFileName = $record['ImageFileName']; 
      $this->Title = $record['Title'];
      $this->ShapeID = $record['ShapeID'];
      $this->MuseumLink = $record['MuseumLink'];
      $this->AccessionNumber = $record['AccessionNumber'];
      $this->CopyrightText = $record['CopyrightText'];
      $this->Description = $record['Description'];
      $this->Excerpt = $record['Excerpt'];
      $this->YearOfWork = $record['YearOfWork'];
      $this->Width = $record['Width'];
      $this->Height = $record['Height'];
  		$this->Medium = $record['Medium'];
  		$this->Cost = $record['Cost'];
  		$this->MSRP = $record['MSRP'];;
  		$this->GoogleLink = $record['GoogleLink'];
  		$this->GoogleDescription = $record['GoogleDescription']; 
  		$this->WikiLink = $record['WikiLink'];
  	}

    public function getPaintingID(){
        return $this->paintingID;
    }

    public function setPaintingID($id){
        $this->paintingID = $id;
    }

    public function getArtistID(){
        return $this->ArtistID;
    }

    public function getShapeID(){
        return $this->ShapeID;
    }

    public function getGalleryID(){
      return $this->GalleryID;  
    }

    public function getDescription(){
        return $this->Description;
    }

    public function getExcerpt(){
    	return $this->Excerpt;
    }

    public function getTitle(){
        return $this->Title;
    }

    public function getImageFileName(){
        return $this->ImageFileName;
    }

    public function getCost(){
        return $this->Cost;
    }

    public function getYearOfWork(){
        return $this->YearOfWork;
    }

    public function getMedium(){
      return $this->Medium;
    }

    public function getHeight(){
      return $this->Height;
    }

    public function getWidth(){
      return $this->Width;
    }

    public function getAccessionNumber(){
      return $this->AccessionNumber;
    }

    public function getCopyright(){
      return $this->CopyrightText;
    }

    public function getURl(){
      return $this->MuseumLink;
    }

    public function getMSRP(){
      return $this->MSRP;
    }

    public function getGoogleLink(){
      return $this->GoogleLink;
    }

    public function getGoogleDesc(){
      return $this->GoogleDescription;
    }

    public function getWikiLink(){
      return $this->WikiLink;
    }
}

?>