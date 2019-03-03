<div class="ui top attached tabular menu ">
    <a class="active item" data-tab="details"><i class="image icon"></i>Details</a>
    <a class="item" data-tab="museum"><i class="university icon"></i>Museum</a>
    <a class="item" data-tab="genres"><i class="theme icon"></i>Genres</a>
    <a class="item" data-tab="subjects"><i class="cube icon"></i>Subjects</a>    
</div>
                
<div class="ui bottom attached active tab segment" data-tab="details">
  <table class="ui definition very basic collapsing celled table">
    <tbody>
      <tr>
        <td>Artist</td>
        <td><?php echo $paintings->FirstName . " " . $paintings->LastName;// output artist name ?></td>                       
      </tr>
      <tr>                       
        <td>Year</td>
        <td><?php echo $paintings->YearOfWork;// output year of work ?></td>
      </tr>       
      <tr>
        <td>Medium</td>
        <td><?php echo $paintings->Medium;// output medium ?></td>
      </tr>  
      <tr>
        <td>Dimensions</td>
        <td><?php echo $paintings->Width . "cm x " . $paintings->Height;// output painting width and height ?>cm</td>
      </tr>        
    </tbody>
  </table>
</div>

<div class="ui bottom attached tab segment" data-tab="museum">
    <table class="ui definition very basic collapsing celled table">
      <tbody>
        <tr>
          <td>Museum</td>
          <td>
            <?php echo $paintings->GalleryID;// output gallery name ?>
          </td>
        </tr>       
        <tr>
          <td>Accession #</td>
          <td>
            <?php echo $paintings->AccessionNumber;// output AccessionNumber ?>
          </td>
        </tr>  
        <tr>
          <td>Copyright</td>
          <td>
            <?php echo $paintings->CopyrightText;// output CopyrightText ?>
          </td>
        </tr>       
        <tr>
          <td>URL</td>
          <td>
            <a href="<?php echo $paintings->MuseumLink;// output MuseumLink ?>">Link to Museum Website</a>
          </td>
        </tr>        
      </tbody>
    </table>    
</div>   

<div class="ui bottom attached tab segment" data-tab="genres">
    <ul class="ui list">
      <?php foreach($genres as $g) {// loop thru genres ?>
        <li class="item">
          <a href=""><?php echo $g->GenreName;// output genre as link ?></a>
        </li>
      <?php } ?>
    </ul>
</div>  

<div class="ui bottom attached tab segment" data-tab="subjects">
    <ul class="ui list">
          <?php foreach($subjects as $s) {// loop thru subjects ?>
            <li class="item">
             <a href=""><?php echo $s->SubjectName;// output subject as link ?></a>
            </li>
          <?php } ?>
    </ul>
</div>  