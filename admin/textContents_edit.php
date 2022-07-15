<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: textContents.php' );
  die();
  
}

if( isset( $_POST['content'] ) )
{
  
  if( $_POST['type'] and $_POST['content'] )
  {
    
    $query = 'UPDATE content SET
      content = "'.mysqli_real_escape_string( $connect, $_POST['content'] ).'",
      type = "'.mysqli_real_escape_string( $connect, $_POST['type'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Content has been updated' );
    
  }

  header( 'Location: textContents.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM content
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: textContents.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Project</h2>

<form method="post">
  
  <label for="content">Content:</label>
  <textarea class="form-control" type="text" name="content" id="content" rows="5"><?php echo htmlentities( $record['content'] ); ?></textarea>
  
  <script>

  ClassicEditor
    .create( document.querySelector( '#content' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
  </script>
  
  <br>
  
  <label for="type">Type:</label>
  <?php
  
  $values = array( 'Hero','AboutMe', 'Contact' );
  
  echo '<select class="form-control" name="type" id="type">';
  foreach( $values as $key => $value )
  {
    echo '<option value="'.$value.'"';
    if( $value == $record['type'] ) echo ' selected="selected"';
    echo '>'.$value.'</option>';
  }
  echo '</select>';
  
  ?>
  
  <br>
  
  <input type="submit" value="Edit Content">
  
</form>

<p><a href="textContents.php"><i class="fas fa-arrow-circle-left"></i> Return to Contents List</a></p>


<?php

include( 'includes/footer.php' );

?>