<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['credential'] ) )
{
  
  if( $_POST['details'] and $_POST['yearCompleted'] )
  {
    
    $query = 'INSERT INTO qualifications (
        credential,
        details,
        yearCompleted
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['credential'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['details'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['yearCompleted'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Qualification has been added' );
    
  }
  
  header( 'Location: qualifications.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Qualification</h2>

<form method="post">
  
  <label for="credential">Credential:</label>
  <input class="form-control" type="text" name="credential" id="credential">
    
  <br>
  
  <label for="details">Details:</label>
  <textarea class="form-control" type="text" name="details" id="details" rows="10"></textarea>
      
  <script>

  ClassicEditor
    .create( document.querySelector( '#details' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
  </script>
  
  <br>
  
  <label for="yearCompleted">Year Completed:</label>
  <input class="form-control" type="number" min="1900" max="2099" name="yearCompleted" id="yearCompleted">
  
  <br>
  
  <input type="submit" value="Add Qualification">
  
</form>

<p><a href="qualifications.php"><i class="fas fa-arrow-circle-left"></i> Return to Qualifications List</a></p>


<?php

include( 'includes/footer.php' );

?>