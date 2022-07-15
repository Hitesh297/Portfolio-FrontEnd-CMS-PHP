<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['description'] and $_POST['technologies'] )
  {
    
    $query = 'INSERT INTO projects (
        title,
        description,
        technologies,
        gitUrl,
        liveUrl,
        sequence
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['technologies'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['gitUrl'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['liveUrl'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['sequence'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Project has been added' );
    
  }
  
  header( 'Location: projects.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Project</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title">
    
  <br>
  
  <label for="description">Description:</label>
  <textarea type="text" name="description" id="description" rows="10"></textarea>
      
  <script>

  ClassicEditor
    .create( document.querySelector( '#description' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
  </script>
  
  <br>
  
  <label for="technologies">Technologies:</label>
  <input class="form-control" type="text" name="technologies" id="technologies">

  <br>
  
  <label for="gitUrl">Git URL:</label>
  <input class="form-control" type="url" name="gitUrl" id="gitUrl">

  <br>
  
  <label for="liveUrl">Live URL:</label>
  <input class="form-control" type="url" name="liveUrl" id="liveUrl">

  <br>
  
  <label for="sequence">Sequence:</label>
  <input class="form-control" type="number" name="sequence" id="sequence">
    
  <br>
  
  <input type="submit" value="Add Project">
  
</form>

<p><a href="projects.php"><i class="fas fa-arrow-circle-left"></i> Return to Project List</a></p>


<?php

include( 'includes/footer.php' );

?>