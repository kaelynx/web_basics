<?php

class PaintingsCollection {
	private $paintings = null;
    private $p = null;

	public function __construct(){
		$this->p = new PaintingsDB(); 
		$paintingEntries = $this->p->getAll(); 
		$this->paintings = array();
		foreach($paintingEntries as $paint){
			$this->paintings[$paint['PaintingID']] = new Paintings($paint);
		}

	}

	public function getPaintings(){
		return $this->paintings;
	}

	public function paintingsList(){

		$l = "";
		//$paintings = $this->getPaintings();
    	//foreach($this->getPaintings() as $pain){
        $temp = $this->p->joinArtist();
        $temp2 = array();
        foreach($temp as $t){
            $temp2[$t['PaintingID']] = new Paintings($t);
        }
        foreach($temp2 as $pain){
        //foreach($this->p->joinArtist() as $pain){
            $id = $pain->getPaintingID();
            $t = $this->getArtistsName($id);
        	$l .= '<li class="item">';
            $l .= '<a class="ui small image" href="detail.php?id='.$pain->getPaintingID().'"><img src="images/art/works/square-medium/' . $pain->getImageFileName(). '.jpg"></a>';
            $l .= '<div class="content"><a class="header" href="single-painting.php?id='.$pain->getPaintingID().'">'.$pain->getTitle().'</a>';
            $l .= '<div class="meta"><span class="cinema">'.$t.'</span></div>'; 
            $l .= '<div class="description"><p>'.$pain->getExcerpt().'</p></div>';
            $l .= '<div class="meta"><strong>$'.number_format($pain->getCost()).'</strong></div>';
            $l .= '<div class="extra"><a class="ui icon orange button" href="cart.php?id=565"><i class="add to cart icon"></i></a><a class="ui icon button" href="favorites.php?id=565"><i class="heart icon"></i></a></div></div>';
        }/*
        	$l .= '<a class="ui small image" href="detail.php?id='.$pain['PaintingID'].'"><img src="images/art/works/square-medium/' . $pain['ImageFileName'] . '.jpg"></a>';
        	$l .= '<div class="content"><a class="header" href="single-painting.php?id='.$pain['PaintingID'].'">'.$pain['Title'].'</a>';
        	$l .= '<div class="meta"><span class="cinema">'.$pain['FirstName']." ".$pain['LastName'].'</span></div>'; 
        	$l .= '<div class="description"><p>'.$pain['Excerpt'].'</p></div>';
        	$l .= '<div class="meta"><strong>$'.number_format($pain['Cost']).'</strong></div>';
        	$l .= '<div class="extra"><a class="ui icon orange button" href="cart.php?id=565"><i class="add to cart icon"></i></a><a class="ui icon button" href="favorites.php?id=565"><i class="heart icon"></i></a></div></div>';
        	$l .= '</li>';
            //$id = $pain->getPaintingID();
        	}*/
        return $l;
    }


    public function listFilter(/*$t, $t1, $t3*/){


        //$byID = /*$t3;//*/$_POST['test3'];
        //$byGallery = /*$t1;//*/$_POST['test1'];
        //$byShape = /*$t;//*/$_POST['test'];

       //$paintingFilters = $this->p->byFilter(/*$byShape, $byGallery, $byID*/);



        //$temp2 = array();
        $temp = $this->getPaintingObjects();
        //foreach($paintingFilters as $t){
        //    $temp2[$t['PaintingID']] = new Paintings($t);
        //}
        //print_r(is_null($temp2));
        $l = "";
        if($temp == null) {
            echo "Sorry, no paintings match your filters.";
        }
        foreach($temp as $pain){
        /*foreach($paintingFilters as $pain){
                $id = $pain['PaintingID'];
                //print_r($id);
                $l .= '<li class="item">';
                $l .= '<a class="ui small image" href="detail.php?id='.$pain['PaintingID'].'"><img src="images/art/works/square-medium/' . $pain['ImageFileName'] . '.jpg"></a>';
                $l .= '<div class="content"><a class="header" href="single-painting.php?id='.$pain['PaintingID'].'">'.$pain['Title'].'</a>';
                $l .= '<div class="meta"><span class="cinema">';
                if(!is_null($pain['FirstName'])){
                    $l .= $pain['FirstName'];
                    $l .= " ";
                }
                if(!is_null($pain['LastName'])){
                    $l .= $pain['LastName'];
                }
                //.$pain['FirstName']." ".$pain['LastName'].;
                $l .= '</span></div>'; 
                $l .= '<div class="description"><p>'.$pain['Excerpt'].'</p></div>';
                $l .= '<div class="meta"><strong>$'.number_format($pain['Cost']).'</strong></div>';
                $l .= '<div class="extra"><a class="ui icon orange button" href="cart.php?id=565"><i class="add to cart icon"></i></a><a class="ui icon button" href="favorites.php?id=565"><i class="heart icon"></i></a></div></div>';
                $l .= '</li>';
        */

                $id = $pain->getPaintingID();
                $t = $this->getArtistsName($id);
                $l .= '<li class="item">';
                $l .= '<a class="ui small image" href="detail.php?id='.$id.'"><img src="images/art/works/square-medium/' . $pain->getImageFileName() . '.jpg"></a>';
                $l .= '<div class="content"><a class="header" href="single-painting.php?id='.$id.'">'.$pain->getTitle().'</a>';
                $l .= '<div class="meta"><span class="cinema">';
                $l .= $t;
                $l .= '</span></div>'; 
                $l .= '<div class="description"><p>'.$pain->getExcerpt().'</p></div>';
                $l .= '<div class="meta"><strong>$'.number_format($pain->getCost()).'</strong></div>';
                $l .= '<div class="extra"><a class="ui icon orange button" href="cart.php?id=565"><i class="add to cart icon"></i></a><a class="ui icon button" href="favorites.php?id=565"><i class="heart icon"></i></a></div></div>';
                $l .= '</li>';
        }
        return $l;

    }

    public function getPaintingObjects(){
        $paintingFilters = $this->p->byFilter();

        $temp2 = array();
        foreach($paintingFilters as $t){
            $temp2[$t['PaintingID']] = new Paintings($t);
        }
        return $temp2;
    }


    public function getArtistsName($id){
        $l = "";

        $paint = $this->p->JoinForName($id);
        foreach($paint as $p){
            $l .= $p[0];
            $l .= " ";
            $l .= $p[1];
        }
        
/*
        foreach($this->p->byFilter() as $pain){
        if($pain['PaintingID'] == $id){
            //print_r($id);
            if(!is_null($pain['FirstName'])){
                $l .= $pain['FirstName'];
                $l .= " ";
            }
            if(!is_null($pain['LastName'])){
                $l .= $pain['LastName'];
            }
        }
        }*/

        return $l;
    }

    public function getGalleryName($id){
        $l = "";
        foreach($this->p->joinGallery() as $pain){
        if($pain['PaintingID'] == $id){
            //print_r($id);
            if(!is_null($pain['GalleryName'])){
                $l .= $pain['GalleryName'];
            }
        }
        }
        return $l;
    }

    public function getTitle($id){
        $l = "";
        foreach($this->getPaintingObjects() as $pain){
            if($pain->getPaintingID() == $id){
                $l .= $pain->getTitle();
            }
        }
      /*  
        foreach($this->p->byFilter() as $pain){
            if($pain['PaintingID'] == $id){
                $l .= $pain['Title'];
            }
        }
    */
        return $l;
    }

    public function getYear($id){
        $l = "";

        foreach($this->getPaintingObjects() as $pain){
            if($pain->getPaintingID() == $id){
                $l .= $pain->getYearofWork();
            }
        }
/*

        foreach($this->p->byFilter() as $pain){
            if($pain['PaintingID'] == $id){
                $l .= $pain['YearOfWork'];
            }
        }
*/
        return $l;
    }

    public function getMedium($id){
        $l = "";
        
        foreach($this->getPaintingObjects() as $pain){
            if($pain->getPaintingID() == $id){
                $l .= $pain->getMedium();
            }
        }
        /*
        foreach($this->p->byFilter() as $pain){
            if($pain['PaintingID'] == $id){
                $l .= $pain['Medium'];
            }
        }*/
        return $l;
    }

    public function getExcerpt($id){
        $l = "";
        /*
        foreach($this->p->byFilter() as $pain){
            if($pain['PaintingID'] == $id){
                $l .= $pain['Excerpt'];
            }
        }*/
        foreach($this->getPaintingObjects() as $pain){
            if($pain->getPaintingID() == $id){
                $l .= $pain->getExcerpt();
            }
        }
        return $l;
    }

    public function getDesc($id){
        $l = "";
        /*
        foreach($this->p->byFilter() as $pain){
            if($pain['PaintingID'] == $id){
                $l .= $pain['Description'];
            }
        }*/
        foreach($this->getPaintingObjects() as $pain){
            if($pain->getPaintingID() == $id){
                $l .= $pain->getDescription();
            }
        }
        return $l;
    }

    public function getAccession($id){
        $l = "";
        foreach($this->getPaintingObjects() as $pain){
            if($pain->getPaintingID() == $id){
                $l .= $pain->getAccessionNumber();
            }
        }
        /*
        foreach($this->p->byFilter() as $pain){
            if($pain['PaintingID'] == $id){
                $l .= $pain['AccessionNumber'];
            }
        }*/
        return $l;
    }

    public function getCopy($id){
        $l = "";
        /*
        foreach($this->p->byFilter() as $pain){
            if($pain['PaintingID'] == $id){
                $l .= $pain['CopyrightText'];
            }
        }*/
        foreach($this->getPaintingObjects() as $pain){
            if($pain->getPaintingID() == $id){
                $l .= $pain->getCopyright();
            }
        }
        return $l;
    }

    public function getMSRP($id){
        $l = "";
        /*
        foreach($this->p->byFilter() as $pain){
            if($pain['PaintingID'] == $id){
                $l.= "$";
                $l .= number_format($pain['MSRP']);
            }
        }*/
        foreach($this->getPaintingObjects() as $pain){
            if($pain->getPaintingID() == $id){
                $l .= "$";
                $l .= number_format($pain->getMSRP());
            }
        }
        return $l;
    }

    public function getURL($id){
        $l = "";
        /*
        foreach($this->p->byFilter() as $pain){
            if($pain['PaintingID'] == $id){
                $l .= '<a href="';
                $l .= $pain['MuseumLink'];
                $l .= '">View painting at museum site</a>';
            }
        }*/
        foreach($this->getPaintingObjects() as $pain){
            if($pain->getPaintingID() == $id){
                $l .= '<a href="';
                $l .= $pain->getURL();
                $l .= '">View painting at museum site</a>';
            }
        }
        return $l;
                          
    }

    public function getWiki($id){
        $l = "";
        /*
        foreach($this->p->byFilter() as $pain){
            if($pain['PaintingID'] == $id){
                $l .= $pain['WikiLink'];
            }
        }*/

        foreach($this->getPaintingObjects() as $pain){
            if($pain->getPaintingID() == $id){
                $l .= '<tr><td>Wikipedia Link</td><td><a href="';
                $l .= $pain->getWikiLink();
                $l .= '">View painting on Wikipedia</a></td></tr>';
            }
        }
        return $l;
    }

    public function getGoogle($id){
        $l = "";
        /*
        foreach($this->p->byFilter() as $pain){
            if($pain['PaintingID'] == $id){
                $l .= $pain['GoogleLink'];
            }
        }
        */
                        
        foreach($this->getPaintingObjects() as $pain){
            if($pain->getPaintingID() == $id){
                $l .= '<tr><td>Google Link</td><td><a href="';
                $l .= $pain->getGoogleLink();
                $l .= '">View painting on Google Art Project</a></td></tr>';
            }
        }
        return $l;
    }

    public function getGoogleText($id){
        $l = "";
        /*
        foreach($this->p->byFilter() as $pain){
            if($pain['PaintingID'] == $id){
                $l .= $pain['GoogleDescription'];
            }
        }*/
                    
        foreach($this->getPaintingObjects() as $pain){
            if($pain->getPaintingID() == $id){
                $l .= '<tr><td>Google Text</td><td>';
                $l .= $pain->getGoogleDesc();
                $l .= '</td></tr>';
            }
        }
        return $l;
    }

    public function getImage($id){

        $l = "";
        /*
        foreach($this->p->byFilter() as $pain){
            if($pain['PaintingID'] == $id){
                $l .= '<img src="images/art/works/medium/';
                $l .= $pain['ImageFileName'];
                $l .= '.jpg" alt="..." class="ui big image" id="artwork">';
                $l .= '<div class="ui fullscreen modal"><div class="image content"><img src="images/art/works/medium/';
                $l .= $pain['ImageFileName'];
                $l .= '.jpg" alt="..." class="image"><div class="description"><p>';
                $l .= $pain['Description'];
                $l .= '</p></div></div></div>'; 
            }
        }*/
        foreach($this->getPaintingObjects() as $pain){
            if($pain->getPaintingID() == $id){
                $l .= '<img src="images/art/works/medium/';
                $l .= $pain->getImageFileName();
                $l .= '.jpg" alt="..." class="ui big image" id="artwork">';
                $l .= '<div class="ui fullscreen modal"><div class="image content"><img src="images/art/works/medium/';
                $l .= $pain->getImageFileName();
                $l .= '.jpg" alt="..." class="image"><div class="description"><p>';
                $l .= $pain->getDescription();
                $l .= '</p></div></div></div>'; 
            }
        }
        return $l;
                
    }

    public function getDimensions($id){
        $l = "";

        foreach($this->getPaintingObjects() as $pain){
            if($pain->getPaintingID() == $id){
                $l .= $pain->getWidth();
                $l .= "cm x ";
                $l .= $pain->getHeight();
                $l .= "cm";
            }
        }

        /*
        foreach($this->p->byFilter() as $pain){
            if($pain['PaintingID'] == $id){
                $l .= $pain['Width'];
                $l .= "cm x ";
                $l .= $pain['Height'];
                $l .= "cm";
            }
        }
        */
        return $l;
    }

    public function getDetailsTable($id) {
        $l = "";
        /*
        foreach($this->p->byFilter() as $pain){
            if($pain['PaintingID'] == $id){
                $l .= '<tbody><tr><td>Artist</td><td><a href="#">';
                $l .= $pain['FirstName'];
                $l .= " ";
                $l .= $pain['LastName'];
                $l .= '</a></td></tr><tr><td>Year</td><td>';
                $l .= $pain['YearOfWork'];
                $l .= '</td></tr><tr><td>Medium</td><td>';
                $l .= $pain['Medium'];
                $l .= '</td></tr><tr><td>Dimensions</td><td>';
                $l .= $pain['Width'];
                $l .= 'cm x ';
                $l .= $pain['Height'];
                $l .= 'cm';
                $l .= '</td></tr></tbody>';
            }
        }*/
        foreach($this->getPaintingObjects() as $pain){
            if($pain->getPaintingID() == $id){
                $l .= '<tbody><tr><td>Artist</td><td><a href="#">';
                $l .= $this->getArtistsName($id);
                $l .= '</a></td></tr><tr><td>Year</td><td>';
                $l .= $pain->getYearOfWork();
                $l .= '</td></tr><tr><td>Medium</td><td>';
                $l .= $pain->getMedium();
                $l .= '</td></tr><tr><td>Dimensions</td><td>';
                $l .= $this->getDimensions($id);
                $l .= '</td></tr></tbody>';
            }
        }
        return $l;
    }


}

?>