<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: qualifications.php' );
  die();
  
}

if( isset( $_POST['credential'] ) )
{
  
  if( $_POST['details'] and $_POST['yearCompleted'] )
  {
    
    $query = 'UPDATE qualifications SET
      credential = "'.mysqli_real_escape_string( $connect, $_POST['credential'] ).'",
      details = "'.mysqli_real_escape_string( $connect, $_POST['details'] ).'",
      yearCompleted = "'.mysqli_real_escape_string( $connect, $_POST['yearCompleted'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Qualification has been updated' );
    
  }

  header( 'Location: qualifications.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM qualifications
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: qualifications.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Qualification</h2>

<form method="post">
  
  <label for="credential">Credential:</label>
  <input class="form-control" type="text" name="credential" id="credential" value="<?php echo htmlentities( $record['credential'] ); ?>">
    
  <br>
  
  <label for="details">Details:</label>
  <textarea class="form-control" type="text" name="details" id="details" rows="5"><?php echo htmlentities( $record['details'] ); ?></textarea>
  
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
  <input class="form-control" type="number" min="1900" max="2099" name="yearCompleted" id="yearCompleted" value="<?php echo htmlentities( $record['yearCompleted'] ); ?>">
  
  <br>
  
  <input type="submit" value="Edit Qualification">
  
</form>

<p><a href="qualifications.php"><i class="fas fa-arrow-circle-left"></i> Return to Qualifications List</a></p>


<?php

include( 'includes/footer.php' );

?>