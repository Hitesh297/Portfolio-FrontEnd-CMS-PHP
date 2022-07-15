<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM qualifications
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'qualification has been deleted' );
  
  header( 'Location: qualifications.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM qualifications
  ORDER BY yearCompleted DESC';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Qualifications</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="left">Credential</th>
    <th align="center">Year Completed</th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left">
        <?php echo htmlentities( $record['credential'] ); ?>
        <br>
        <small><?php echo $record['details']; ?></small>
      </td>
      <td align="center"><?php echo $record['yearCompleted']; ?></td>
      <td align="center"><a href="qualifications_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="qualifications.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this project?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="qualifications_add.php"><i class="fas fa-plus-square"></i> Add Qualification</a></p>


<?php

include( 'includes/footer.php' );

?>