<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM content
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Content has been deleted' );
  
  header( 'Location: textContents.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM content';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Text Contents</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="left">Content</th>
    <th align="center">Type</th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left">
        <?php echo htmlentities( $record['content'] ); ?>
      </td>
      <td align="center"><?php echo $record['type']; ?></td>
      <td align="center"><a href="textContents_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="textContents.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this project?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="textContents_add.php"><i class="fas fa-plus-square"></i> Add Text Content</a></p>


<?php

include( 'includes/footer.php' );

?>