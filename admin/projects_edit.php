<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: projects.php' );
  die();
  
}

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'] and $_POST['description'] )
  {
    
    $query = 'UPDATE projects SET
      title = "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
      description = "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'",
      technologies = "'.mysqli_real_escape_string( $connect, $_POST['technologies'] ).'",
      gitUrl = "'.mysqli_real_escape_string( $connect, $_POST['gitUrl'] ).'",
      liveUrl = "'.mysqli_real_escape_string( $connect, $_POST['liveUrl'] ).'",
      sequence = "'.mysqli_real_escape_string( $connect, $_POST['sequence'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Project has been updated' );
    
  }

  header( 'Location: projects.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM projects
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: projects.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Project</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input class="form-control" type="text" name="title" id="title" value="<?php echo htmlentities( $record['title'] ); ?>">
    
  <br>
  
  <label for="description">Description:</label>
  <textarea class="form-control" type="text" name="description" id="description" rows="5"><?php echo htmlentities( $record['description'] ); ?></textarea>
  
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
  <input class="form-control" type="text" name="technologies" id="technologies" value="<?php echo htmlentities( $record['technologies'] ); ?>">

  <br>
  
  <label for="gitUrl">Git URL:</label>
  <input class="form-control" type="url" name="gitUrl" id="gitUrl" value="<?php echo htmlentities( $record['gitUrl'] ); ?>">

  <br>
  
  <label for="liveUrl">Live URL:</label>
  <input class="form-control" type="url" name="liveUrl" id="liveUrl" value="<?php echo htmlentities( $record['liveUrl'] ); ?>">

  <br>
  
  <label for="sequence">Sequence:</label>
  <input class="form-control" type="number" name="sequence" id="sequence" value="<?php echo htmlentities( $record['sequence'] ); ?>">
    
  <br>
  
  <input type="submit" value="Edit Project">
  
</form>

<p><a href="projects.php"><i class="fas fa-arrow-circle-left"></i> Return to Project List</a></p>


<?php

include( 'includes/footer.php' );

?>