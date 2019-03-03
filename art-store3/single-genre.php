<?php

include 'includes/art-config.inc.php';

$default = 87;
if (isset($_GET['id']) && ! empty($_GET['id'])) {
    $default = $_GET['id'];
}
try {
    
    // make use of genre and painting gateways
    $genre = new GenreTableGateway($dbAdapter);
    $genres = $genre->findById($default);
    //print_r($genre);
    $gate = new PaintingTableGateway($dbAdapter);
    $paintings = $gate->getAllByGenre($default);
    //print_r($paintings);
    
}
catch (PDOException $e) {
   die( $e->getMessage() );
}



?>

<!DOCTYPE html>
<html lang=en>
<head>
<meta charset=utf-8>
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="css/semantic.js"></script>
  
    
    <link href="css/semantic.css" rel="stylesheet" >
    <link href="css/icon.css" rel="stylesheet" >
    <link href="css/styles.css" rel="stylesheet">
    
    
</head>
<body >
    
<?php include 'includes/art-header.inc.php'; ?>
    
<main >
    
    <section class="ui segment grey100">
        <div class="ui doubling stackable grid container">
            <div class="three wide column">
                <img src="images/art/genres/square-medium/<?php echo $genres->GenreID; ?>.jpg" 
                    alt="<?php echo $genres->GenreID;  ?>" class="ui big image" id="artwork">
            </div>
            <div class="thirteen wide column">
              <h1><?php echo $genres->GenreName;// output genre name  ?></h1>
                <p><?php echo $genres->Description;// output genre description  ?></p>
            </div>            
        </div>                
    </section>
    <div class="ui hidden divider"></div>
    
    <section class="ui container">
        <h3 class="ui dividing header">Paintings</h3>
        
        <div class="ui six doubling cards ">
        
        
            
            <?php foreach($paintings as $p) {// loop through paintings ?>
   
                <div class="ui fluid card">
                    <a href="single-painting.php?id=<?php echo $p->PaintingID;// output painting id ?>">
                    <div class="ui fluid image">
                        <img src="images/art/works/square-medium/<?php echo $p->ImageFileName;// output painting filename  ?>.jpg">
                    </div>
                    </a>
                </div>

            <?php } ?>
            
                
        </div>

    </section>
</main>    
    
  <footer class="ui black inverted segment">
      <div class="ui container">footer</div>
  </footer>
</body>
</html>    