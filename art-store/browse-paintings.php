<?php 
  include 'include/art-store-util.php';

  $engine = new ArtStoreEngine(); 
  $dropArtist = $engine->getArtistCollection();
  $dropGallery = $engine->getGalleriesCollection();
  $dropShapes = $engine->getShapesCollection();
  $paintings = $engine->getPaintingsCollection();
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
    
<main class="ui segment doubling stackable grid container">

    <section class="five wide column">

        <form class="ui form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
          <h4 class="ui dividing header">Filters</h4>

          <div class="field">
            <label>Artist</label>

               
                <?php
                  echo $dropArtist->artistDropdown();
                ?>
              

          </div>  
          <div class="field">
            <label>Museum</label>
 
                <?php
                  echo $dropGallery->galleryDropdown();
                ?>

          </div>   
          <div class="field">
            <label>Shape</label>

                <?php
                echo $dropShapes->shapesDropdown();
                ?>

          </div>   

            <button class="small ui orange button" type="submit" name="submit">
              <i class="filter icon"></i> Filter 
            </button>    

        </form>
    </section>
    

    <section class="eleven wide column">
        <h1 class="ui header">Paintings</h1>
        <ul class="ui divided items" id="paintingsList">

          <?php
          if($_SERVER['REQUEST_METHOD'] == 'POST') {
          if(isset($_POST['submit'])) {
            echo $paintings->listFilter(/*$_POST['test'], $_POST['test1'], $_POST['test3']*/);

            } 
          }
          else {
           echo $paintings->paintingsList();
          }
        
          ?>
   

        </ul>        
    </section>  
    
</main>    
    
  <footer class="ui black inverted segment">
      <div class="ui container">footer for later</div>
  </footer>
</body>
</html>