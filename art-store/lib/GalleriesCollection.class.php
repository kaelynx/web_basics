<?php

class GalleriesCollection {
	private $galleries = null;
    private $g = null;

	public function __construct(){
		$g = new GalleriesDB();
		$GalleryEntries = $g->getAll();
		$this->galleries = array();
		foreach($GalleryEntries as $gal){
			//use id as key
			$this->galleries[$gal['GalleryID']] = new Galleries($gal);
		}
	}

	public function getGalleries(){
		return $this->galleries;
	}
/*
	public function findArtistByID($id){
		return $this->artists[$id];
	}
	*/

    public function galleryDropdown() {

    	$l = "";
    	$l .= '<select class="ui fluid dropdown" name="test1"><option value="">Select Museum</option>'; 
    	foreach($this->getGalleries() as $ga){
    		//$id .= $ga->getGalleryID();
            $l .= '<option name="GalleryID" value="'.$ga->getGalleryID().'">';
            $l .= $ga->getGalleryName(); 
            $l .= '</option>';
                //utf8_encode($l);
                //print_r($data[3]);
            //print_r($id);

        }
            //print_r($l);
        //print_r($id);
        $l .= '</select>';
        return $l;
    }

    public function galleryName(){
        $l .= "";
        foreach($this->getGalleries() as $ga){
            $l .= $ga->getGalleryName(); 
        }
        return $l;
    }
}



?>