<?php
class ArtistCollection{

	private $artists = null;
    private $a = null;

	public function __construct(){
		$a = new ArtistDB();
		$artistEntries = $a->getAll();
		$this->artists = array();
		foreach($artistEntries as $art){
			//use id as key
			$this->artists[$art['ArtistID']] = new Artist($art);
		}
	}

	public function getArtists(){
		return $this->artists;
	}

	public function findArtistByID($id){
		return $this->artists[$id];
	}
/*
    public function artistName($id, $first, $last) {
        $option =  "<option value='" . $id . "'>" . $first . " " . $last . "</option>";
        return $option;
    }
*/
    public function artistDropdown() {

        $l = "";
        $l .= '<select class="ui fluid dropdown" name="test3"><option value="">Select Artist</option>';
        foreach($this->getArtists() as $ar){
            $l .= '<option name="ArtistID" value="'.$ar->getArtistID().'">';
            /*$t = $ar->getArtistID();
            $t2 = $this->findArtistByID($t);
            if(is_null($t2))
                echo "fff";
            else echo "ggg";*/
            //print_r($ar->getArtistID()." ");
            $l .= $ar->getFirstName(); 
            $l .= " ";
            $l .= $ar->getLastName();
            $l .= '</option>';

        }
        $l .= '</select>';
            //print_r($l);
        return $l;
    }
/*
    public function displayAllWorksByArtistID($id){
        $works="";
        $artists=$this->findArtistByID($id);
        foreach ($artists as $todo) { 
            //
        }
        return $works;
    }
/*
    public function displayAllHyperLinkedArtistNames(){
        $names="";
        foreach ($this->getEmployees() as $emp) {
            $names.= '<li class="mdl-list__item">';
            $names.= '<a href="chapter14-project1.php?employee='.$emp->getEmployeeID().'">'.$emp->getFirstName().' '.$emp->getLastName().'</a>';
            $names.= '</li>    ';
        }
        return $names;
    }

    public function displayAddressByID($id){
        $requestedEmployee = $this->findEmployeeByID($id);
        
        $address="";
        $address .= '<h4>'.$requestedEmployee->getFirstName().' '.$requestedEmployee->getLastName() .'</h4>';
        $address .= $requestedEmployee->getAddress() .'<br>';
        $address .= $requestedEmployee->getCity().' , '.$requestedEmployee->getRegion().'<br>';
        $address .= $requestedEmployee->getCountry().' , '.$requestedEmployee->getPostal() .'<br>';
        $address .= $requestedEmployee->getEmail();
        return $address;
    }  
    */  
}
?>