<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM experience
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Experience has been deleted' );
  
  header( 'Location: experiences.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM experience';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Experiences</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="left">Comapny Name</th>
    <th align="center">Position</th>
    <th align="center">Duration</th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="center" style="white-space: nowrap;"><?php echo htmlentities( $record['companyName'] ); ?></td>
      <td align="left">
        <?php echo htmlentities( $record['position'] ); ?>
        <small><?php echo $record['responsibilities']; ?></small>
      </td>
      <td align="center"><?php
      $startDate=date_create($record['startDate']);
      $endDate=date_create($record['endDate']);
       echo date_format($startDate,'M Y').' - '.date_format($endDate,'M Y'); 
       ?></td>
      <td align="center"><a href="experiences_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="experiences.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this experience?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="experiences_add.php"><i class="fas fa-plus-square"></i> Add Experience</a></p>


<?php

include( 'includes/footer.php' );

?>