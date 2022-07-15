<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM socialMedia
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Social Media Link has been deleted' );
  
  header( 'Location: socialLinks.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM socialMedia
  ORDER BY sequence';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Social Media Links</h2>

<table>
  <tr>
    <th></th>
    <th align="center">ID</th>
    <th align="left">URL</th>
    <th align="center">Sequence</th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td class="fa-icon" align="center">
        <?php echo $record['logo']; ?>
      </td>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left">
        <?php echo htmlentities( $record['url'] ); ?>
      </td>
      <td align="center"><?php echo $record['sequence']; ?></td>
      <td align="center"><a href="socialLinks_photo.php?id=<?php echo $record['id']; ?>">Photo</i></a></td>
      <td align="center"><a href="socialLinks_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="socialLinks.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this social media link?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="socialLinks_add.php"><i class="fas fa-plus-square"></i> Add Social Media Link</a></p>


<?php

include( 'includes/footer.php' );

?>