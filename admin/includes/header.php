<!doctype html>
<html>
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  
  <title>Portfolio Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="styles.css" type="text/css" rel="stylesheet">
  <script async defer src="https://kit.fontawesome.com/08690c32d6.js" crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
  
</head>
<body>
  
  <h1 style="padding-left:1% ;">Portfolio Admin</h1>
  
  <?php if(isset($_SESSION['id'])): ?>

    <p style="padding: 0 1%; text-align: center;">
      <a href="dashboard.php">Dashboard</a> | 
      <a href="logout.php">Logout</a>
    </p>
  
  <?php endif; ?>
  
  <hr>
  
  <?php echo get_message(); ?>
  
  <div style="max-width: 1500px; margin: auto; padding: 0 1%;">
  
