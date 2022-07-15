<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['content'] ) )
{
  
  if( $_POST['type'] and $_POST['content'] )
  {
    
    $query = 'INSERT INTO content (
        content,
        type
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['content'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['type'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Content has been added' );
    
  }
  
  header( 'Location: textContents.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Project</h2>

<form method="post">
  
  <label for="content">Content:</label>
  <textarea class="form-control" type="text" name="content" id="content" rows="10"></textarea>
      
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
    echo '>'.$value.'</option>';
  }
  echo '</select>';
  
  ?>
  
  <br>
  
  <input type="submit" value="Add Content">
  
</form>

<p><a href="textContents.php"><i class="fas fa-arrow-circle-left"></i> Return to Content List</a></p>


<?php

include( 'includes/footer.php' );

?>