<?php 

class Galleries {

	public $GalleryID;
	public $GalleryName;
	public $GalleryNativeName;
	public $GalleryCity;
	public $GalleryCountry;
	public $Latitude;
	public $Longitude;
	public $GalleryWebSite;

    function __construct($record) {
    	$this->GalleryID = $record['GalleryID'];
		$this->GalleryName = $record['GalleryName'];
		$this->GalleryNativeName = $record['GalleryNativeName'];
		$this->GalleryCity = $record['GalleryCity'];
		$this->GalleryCountry = $record['GalleryCountry'];
		$this->Latitude = $record['Latitude'];
		$this->Longitude = $record['Longitude'];
		$this->GalleryWebSite = $record['GalleryWebSite'];
    }

    function getGalleryName() {
    	return $this->GalleryName;
    }

    function getGalleryID(){
    	return $this->GalleryID;
    }
}

?>