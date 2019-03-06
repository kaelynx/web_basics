<?php

class Artist {
	public $ArtistID;
    public $FirstName;
    public $LastName;
    public $Nationality;
    public $Gender;
    public $YearOfBirth;
    public $YearOfDeath;
    public $Details;
    public $ArtistLink;
    //public $Works;

    function __construct($record) {
    	$this->ArtistID = $record['ArtistID'];
		$this->FirstName = $record['FirstName'];
		$this->LastName = $record['LastName'];
		$this->Nationality = $record['Nationality'];
		$this->Gender = $record['Gender'];
		$this->YearOfBirth = $record['YearOfBirth'];
		$this->YearOfDeath = $record['YearOfDeath'];
		$this->Details = $record['Details'];
		$this->ArtistLink = $record['ArtistLink'];
		//$this->Works = $record['Works'];
    }

    public function getLastName(){
        return $this->LastName;
    }

    public function getFirstName(){
        return $this->FirstName;
    }

    public function getArtistID(){
    	return $this->ArtistID;
    }
}
?>