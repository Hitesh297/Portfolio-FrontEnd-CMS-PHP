<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Send Email page</title>
</head>
<body>
  <h2>This page will be used to send email.</h2>
</body>
</html>
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