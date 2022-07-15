<?php

include('admin/includes/database.php');
include('admin/includes/config.php');
include('admin/includes/functions.php');

secure();

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['email'] and $_POST['message'] )
  {
    
    $query = 'INSERT INTO contactForm (
        name,
        email,
        message
      ) VALUES (
        "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
        "'.mysqli_real_escape_string( $connect, $_POST['email'] ).'",
        "'.mysqli_real_escape_string( $connect, $_POST['message'] ).'"
      )';
    mysqli_query( $connect, $query );
    $headers = "From:" . $_POST['email'];
    
  }

  die();
  
}