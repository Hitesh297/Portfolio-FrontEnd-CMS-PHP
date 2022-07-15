<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: socialLinks.php' );
  die();
  
}

if( isset( $_POST['url'] ) )
{
  
  if( $_POST['sequence'] and $_POST['logo'] )
  {
    
    $query = 'UPDATE socialMedia SET
      url = "'.mysqli_real_escape_string( $connect, $_POST['url'] ).'",
      sequence = "'.mysqli_real_escape_string( $connect, $_POST['sequence'] ).'",
      logo = "'.mysqli_real_escape_string( $connect, $_POST['logo'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Social Media Link has been updated' );
    
  }

  header( 'Location: socialLinks.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM socialMedia
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: socialLinks.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Social Media Link</h2>

<form method="post">

<label for="logo">Logo (Font Awesome HTML Tag):</label>
  <input class="form-control" type="text" name="logo" id="sociallogo" value="<?php echo htmlentities( $record['logo'] ); ?>">
    
  <br>
  
  <label for="url">URL:</label>
  <input class="form-control" type="url" name="url" id="url" value="<?php echo htmlentities( $record['url'] ); ?>">
    
  <br>
  
  <label for="sequence">Sequence:</label>
  <input class="form-control" type="number" name="sequence" id="sequence" value="<?php echo htmlentities( $record['sequence'] ); ?>">
  
  <br>
  
  <input type="submit" value="Edit Social Media Link">
  
</form>

<p><a href="socialLinks.php"><i class="fas fa-arrow-circle-left"></i> Return to Social Media Links</a></p>


<?php

include( 'includes/footer.php' );

?>