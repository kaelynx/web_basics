<?php 
  include 'include/art-store-util.php';

  $engine = new ArtStoreEngine();
  $artist = $engine->getArtistCollection();
  $gallery = $engine->getGalleriesCollection();
  $typesMatt = $engine->getTypesMattCollection();
  $typesGlass = $engine->getTypesGlassCollection();
  $typesFrame = $engine->getTypesFramesCollection();
  $paintings = $engine->getPaintingsCollection();
  $reviews = $engine->getReviewsCollection();
  $genres = $engine->getGenresCollection();
  $subjects = $engine->getSubjectsCollection();
  
  if(isset($_GET['id']))
  $id = $_GET['id'];
  else $id = '420';
?>


<!DOCTYPE html>
<html lang=en>
<head>
<meta charset=utf-8>
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="css/semantic.js"></script>
	<script src="js/misc.js"></script>
    
    <link href="css/semantic.css" rel="stylesheet" >
    <link href="css/icon.css" rel="stylesheet" >
    <link href="css/styles.css" rel="stylesheet">   
</head>
<body >

<?php include 'include/header.inc.php'; ?>    

<main >
    <!-- Main section about painting -->
    <section class="ui segment grey100">
        <div class="ui doubling stackable grid container">
		
            <div class="nine wide column">
            <?php echo $paintings->getImage($id); ?>            
                
            </div>	<!-- END LEFT Picture Column --> 
			
            <div class="seven wide column">
                
                <!-- Main Info -->
                <div class="item">
					<h2 class="header">
            <?php 
            echo $paintings->getTitle($id); 
            ?>
          </h2>
					<h3>

          <?php 
            echo $paintings->getArtistsName($id); 
          ?>
        </h3>
					<div class="meta">
						<p>
              <?php echo $reviews->avgRating($id); ?>
						</p>
						<p><?php echo $paintings->getExcerpt($id);?></p>
					</div>  
                </div>                          
                  
                <!-- Tabs For Details, Museum, Genre, Subjects -->
                <div class="ui top attached tabular menu ">
                    <a class="active item" data-tab="details"><i class="image icon"></i>Details</a>
                    <a class="item" data-tab="museum"><i class="university icon"></i>Museum</a>
                    <a class="item" data-tab="genres"><i class="theme icon"></i>Genres</a>
                    <a class="item" data-tab="subjects"><i class="cube icon"></i>Subjects</a>    
                </div>
                
                <div class="ui bottom attached active tab segment" data-tab="details">
                    <table class="ui definition very basic collapsing celled table">
					           <?php echo $paintings->getDetailsTable($id); ?>
					           </table>
                </div>
				
                <div class="ui bottom attached tab segment" data-tab="museum">
                    <table class="ui definition very basic collapsing celled table">
                      <tbody>
                        <tr>
                          <td>
                              Museum
                          </td>
                          <td>
                          <?php 
                          echo $paintings->getGalleryName($id);
                          ?>
                          </td>
                        </tr>       
                        <tr>
                          <td>
                              Accession #
                          </td>
                          <td>
                            <?php echo $paintings->getAccession($id); ?>
                          </td>
                        </tr>  
                        <tr>
                          <td>
                              Copyright
                          </td>
                          <td>
                            <?php echo $paintings->getCopy($id); ?>
                          </td>
                        </tr>       
                        <tr>
                          <td>
                              URL
                          </td>
                          <td>
                            <?php echo $paintings->getURL($id); ?>
                          </td>
                        </tr>        
                      </tbody>
                    </table>    
                </div>     
                <div class="ui bottom attached tab segment" data-tab="genres">
 
                  <?php echo $genres->getGenreNames($id); ?>

                </div>  
                <div class="ui bottom attached tab segment" data-tab="subjects">
                  <?php echo $subjects->getSubjectNames($id); ?>
                </div>  
                
                <!-- Cart and Price -->
                <div class="ui segment">
                    <div class="ui form">
                        <div class="ui tiny statistic">
                          <div class="value">
                            <?php echo $paintings->getMSRP($id); ?>
                          </div>
                        </div>
                        <div class="four fields">
                            <div class="three wide field">
                                <label>Quantity</label>
                                <input type="number">
                            </div>                               
                            <div class="four wide field">
                                <label>Frame</label>
                                <?php
                                echo $typesFrame->TypesFramesDropdown();
                                ?>
                            </div>  
                            <div class="four wide field">
                                <label>Glass</label>
                                <?php
                                echo $typesGlass->TypesGlassDropdown();
                                ?>
                            </div>  
                            <div class="four wide field">
                                <label>Matt</label>
                                <?php
                                  echo $typesMatt->TypesMattDropdown();
                                ?>

                            </div>           
                        </div>                     
                    </div>

                    <div class="ui divider"></div>

                    <button class="ui labeled icon orange button">
                      <i class="add to cart icon"></i>
                      Add to Cart
                    </button>
                    <button class="ui right labeled icon button">
                      <i class="heart icon"></i>
                      Add to Favorites
                    </button>        
                </div>     <!-- END Cart -->                      
                          
            </div>	<!-- END RIGHT data Column --> 
        </div>		<!-- END Grid --> 
    </section>		<!-- END Main Section --> 
    
    <!-- Tabs for Description, On the Web, Reviews -->
    <section class="ui doubling stackable grid container">
        <div class="sixteen wide column">
        
            <div class="ui top attached tabular menu ">
              <a class="active item" data-tab="first">Description</a>
              <a class="item" data-tab="second">On the Web</a>
              <a class="item" data-tab="third">Reviews</a>
            </div>
			
            <div class="ui bottom attached active tab segment" data-tab="first">
            <?php echo $paintings->getDesc($id); ?>
            </div>	<!-- END DescriptionTab --> 
			
            <div class="ui bottom attached tab segment" data-tab="second">
				<table class="ui definition very basic collapsing celled table">
                  <tbody>
                      <?php 
                      echo $paintings->getWiki($id); 
                      echo $paintings->getGoogle($id);
                      echo $paintings->getGoogleText($id);
                      ?>                      
       
                  </tbody>
                </table>
            </div>   <!-- END On the Web Tab --> 
			
            <div class="ui bottom attached tab segment" data-tab="third">                
				<div class="ui feed">
					                   

							<?php 
             // echo $reviews->avgRating($id);
              echo $reviews->getReview($id); 
              ?>
								
				</div>                                
            </div>   <!-- END Reviews Tab -->          
        
        </div>        
    </section> <!-- END Description, On the Web, Reviews Tabs --> 
    
    <!-- Related Images ... will implement this in assignment 2 -->    
    <section class="ui container">
    <h3 class="ui dividing header">Related Works </h3>  
  
	</section>  
	
</main>    
    

    
  <footer class="ui black inverted segment">
      <div class="ui container">footer</div>
  </footer>
</body>
</html>