<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['url'] ) )
{
  
  if( $_POST['sequence'] and $_POST['logo'] )
  {
    
    $query = 'INSERT INTO socialMedia (
        url,
        sequence,
        logo
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['url'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['sequence'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['logo'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Social Media Link has been added' );
    
  }
  
  header( 'Location: socialLinks.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Project</h2>

<form method="post">

<label for="logo">Logo (Font Awesome HTML Tag):</label>
  <input class="form-control" type="text" name="logo" id="sociallogo">
    
  <br>
  
  <label for="url">URL:</label>
  <input class="form-control" type="url" name="url" id="url">
    
  <br>
  
  <label for="sequence">Sequence:</label>
  <input class="form-control" type="number" name="sequence" id="sequence">
  
  <br>
  
  <input type="submit" value="Add Social Media Link">
  
</form>

<p><a href="socialLinks.php"><i class="fas fa-arrow-circle-left"></i> Return to Social Media Links</a></p>


<?php

include( 'includes/footer.php' );

?>