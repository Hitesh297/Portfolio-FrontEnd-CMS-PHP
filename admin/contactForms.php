<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM contactForm
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Contact Form has been deleted' );
  
  header( 'Location: contactForms.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM contactForm';
$result = mysqli_query( $connect, $query );
?>

<h2>Manage Conatct Forms</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="left">Name</th>
    <th align="center">Email</th>
    <th align="center">Message</th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left">
        <?php echo $record['name']; ?>
      </td>
      <td align="center"><?php echo $record['email']; ?></td>
      <td align="center" style="white-space: nowrap;"><?php echo $record['message']; ?></td>
      <td align="center">
        <a href="contactForms.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this project?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>


<?php

include( 'includes/footer.php' );

?>