<?php
	
	class ReviewsCollection{
		private $reviews = null;
    	private $r = null;

		public function __construct(){
			$r = new ReviewsDB();
			$reviewEntries = $r->getAll();
			$this->reviews = array();
			foreach($reviewEntries as $rev){
			//use id as key
			$this->reviews[$rev['RatingID']] = new Reviews($rev);
			}
		}

		public function getReviews(){
			return $this->reviews;
		}

		public function findReviewsByID($id){
			return $this->reviews[$id];
		}

		public function getComments($id){
        	$l = "";
        	foreach($this->getReviews() as $r){
            	if($r->getPaintingID() == $id){
            	    $l .= $r->getComment();
           	 	}
        	}
        	return $l;
		}

		public function avgRating($id){
			$l = "";
			$a = 0;
			$count = 0;
        	foreach($this->getReviews() as $r){
            	if($r->getPaintingID() == $id){
            		$a += $r->getRating(); 
            		$count++;
            	}

			}
			if($count > 0){
			$average = $a/$count;  
			}
			else $average = 0;
			//print_r($count);
			$count2 = 0;
			for($i = 0; $i < $average; $i++){
				$l .= '<i class="orange star icon"></i>';
				$count2++;
			}
			for($j = $count2; $j < 5; $j++){
				$l .= '<i class="empty star icon"></i>';
			}

			return $l;
		}

		public function getReview($id){
        	$l = "";
        	foreach($this->getReviews() as $r){
            	if($r->getPaintingID() == $id){
				  $l .= '<div class="event"><div class="content"><div class="date">';
				  $l .= date("m/d/y", strtotime($r->getReviewDate()));
				  $l .= '</div><div class="meta"><a class="like"><i class="star icon"></i><i class="star icon"></i><i class="star icon"></i><i class="star icon"></i><i class="star icon"></i></a></div><div class="summary">';
            	  $l .= $r->getComment();
            	  $l .= '</div></div></div>';
            	  $l .= '<div class="ui divider"></div>';  
            	    //$l .= $r->getRating();
           	 	}
        	}
        	return $l;
		}
	}


?>