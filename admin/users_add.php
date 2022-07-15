<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['firstName'] ) )
{
  
  if( $_POST['firstName'] and $_POST['lastName'] and $_POST['email'] and $_POST['password'] )
  {
    
    $query = 'INSERT INTO users (
        firstName,
        lastName,
        email,
        password,
        active
      ) VALUES (
        "'.mysqli_real_escape_string( $connect, $_POST['firstName'] ).'",
        "'.mysqli_real_escape_string( $connect, $_POST['lastName'] ).'",
        "'.mysqli_real_escape_string( $connect, $_POST['email'] ).'",
        "'.md5( $_POST['password'] ).'",
        "'.$_POST['active'].'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'User has been added' );
    
  }

  header( 'Location: users.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add User</h2>

<form method="post">
  
  <label for="firstName">First Name:</label>
  <input class="form-control" type="text" name="firstName" id="firstName">
  
  <br>
  
  <label for="lastName">Last Name:</label>
  <input class="form-control" type="text" name="lastName" id="lastName">
  
  <br>
  
  <label for="email">Email:</label>
  <input class="form-control" type="email" name="email" id="email">
  
  <br>
  
  <label for="password">Password:</label>
  <input class="form-control" type="password" name="password" id="password">
  
  <br>
  
  <label for="active">Active:</label>
  <?php
  
  $values = array( 'Yes', 'No' );
  
  echo '<select class="form-control" name="active" id="active">';
  foreach( $values as $key => $value )
  {
    echo '<option value="'.$value.'"';
    echo '>'.$value.'</option>';
  }
  echo '</select>';
  
  ?>
  
  <br>
  
  <input type="submit" value="Add User">
  
</form>

<p><a href="users.php"><i class="fas fa-arrow-circle-left"></i> Return to User List</a></p>


<?php

include( 'includes/footer.php' );

?>