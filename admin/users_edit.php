<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: users.php' );
  die();
  
}

if( isset( $_POST['firstName'] ) )
{
  
  if( $_POST['firstName'] and $_POST['lastName'] and $_POST['email'] )
  {
    
    $query = 'UPDATE users SET
      firstName = "'.mysqli_real_escape_string( $connect, $_POST['firstName'] ).'",
      lastName = "'.mysqli_real_escape_string( $connect, $_POST['lastName'] ).'",
      email = "'.mysqli_real_escape_string( $connect, $_POST['email'] ).'",
      active = "'.$_POST['active'].'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    if( $_POST['password'] )
    {
      
      $query = 'UPDATE users SET
        password = "'.md5( $_POST['password'] ).'"
        WHERE id = '.$_GET['id'].'
        LIMIT 1';
      mysqli_query( $connect, $query );
      
    }
    
    set_message( 'User has been updated' );
    
  }

  header( 'Location: users.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM users
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: users.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit User</h2>

<form method="post">
  
  <label for="firstName">First Name:</label>
  <input class="form-control" type="text" name="firstName" id="firstName" value="<?php echo htmlentities( $record['firstName'] ); ?>">
  
  <br>
  
  <label for="lastName">Last Name:</label>
  <input class="form-control" type="text" name="lastName" id="lastName" value="<?php echo htmlentities( $record['lastName'] ); ?>">
  
  <br>
  
  <label for="email">Email:</label>
  <input class="form-control" type="email" name="email" id="email" value="<?php echo htmlentities( $record['email'] ); ?>">
  
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
    if( $value == $record['active'] ) echo ' selected="selected"';
    echo '>'.$value.'</option>';
  }
  echo '</select>';
  
  ?>
  
  <br>
  
  <input type="submit" value="Edit User">
  
</form>

<p><a href="users.php"><i class="fas fa-arrow-circle-left"></i> Return to User List</a></p>


<?php

include( 'includes/footer.php' );

?>