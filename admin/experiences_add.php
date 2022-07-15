<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['companyName'] ) )
{
  
  if( $_POST['position'] and $_POST['responsibilities'] and $_POST['startDate'])
  {
    
    $query = 'INSERT INTO experience (
        companyName,
        position,
        responsibilities,
        startDate,
        endDate
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['companyName'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['position'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['responsibilities'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['startDate'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['endDate'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Experience has been added' );
    
  }
  
  header( 'Location: experiences.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Project</h2>

<form method="post">
  
  <label for="companyName">Company Name:</label>
  <input class="form-control" type="text" name="companyName" id="companyName" required>
    
  <br>

  <label for="position">Position:</label>
  <input class="form-control" type="text" name="position" id="position" required>
  
  <br>
  
  <label for="position">Responsibilities:</label>
  <textarea class="form-control" type="text" name="responsibilities" id="responsibilities" rows="10"></textarea>
      
  <script>

  ClassicEditor
    .create( document.querySelector( '#responsibilities' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
  </script>
  
  <br>
  
  <label for="startDate">Start Date:</label>
  <input class="form-control" type="date" name="startDate" id="startDate" required>

  <br>
  
  <label for="endDate">End Date:</label>
  <input class="form-control" type="date" name="endDate" id="endDate" required>
  
  <br>
  
  <input type="submit" value="Add Experience">
  
</form>

<p><a href="experiences.php"><i class="fas fa-arrow-circle-left"></i> Return to Experience List</a></p>


<?php

include( 'includes/footer.php' );

?>