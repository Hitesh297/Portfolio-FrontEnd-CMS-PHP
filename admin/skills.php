<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM skills
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Skill has been deleted' );
  
  header( 'Location: skills.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM skills
  ORDER BY sequence DESC';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Skills</h2>

<table>
  <tr>
    <th></th>
    <th align="center">ID</th>
    <th align="left">Type</th>
    <th align="center">Sequence</th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td class="fa-icon" align="center">
      <?php echo  $record['fontawesomeHTML'] ; ?>
        <!-- <img src="image.php?type=skill&id=<?php echo $record['id']; ?>&width=300&height=300&format=inside"> -->
      </td>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left">
        <?php echo htmlentities( $record['type'] ); ?>
        <br>
        <small><?php echo $record['details']; ?></small>
      </td>
      <td align="center"><?php echo $record['sequence']; ?></td>
      
      <td align="center"><a href="skills_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="skills.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this project?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="skills_add.php"><i class="fas fa-plus-square"></i> Add Skill</a></p>


<?php

include( 'includes/footer.php' );

?>