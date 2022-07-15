<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

if (!isset($_GET['id'])) {

  header('Location: skills.php');
  die();
}

if (isset($_POST['type'])) {

  if ($_POST['details'] and $_POST['sequence'] and $_POST['fontawesomeHTML']) {

    $query = 'UPDATE skills SET
      fontawesomeHTML = "' . mysqli_real_escape_string($connect, $_POST['fontawesomeHTML']) . '",
      type = "' . mysqli_real_escape_string($connect, $_POST['type']) . '",
      details = "' . mysqli_real_escape_string($connect, $_POST['details']) . '",
      sequence = "' . mysqli_real_escape_string($connect, $_POST['sequence']) . '"
      WHERE id = ' . $_GET['id'] . '
      LIMIT 1';
    mysqli_query($connect, $query);

    set_message('Skill has been updated');
  }

  header('Location: skills.php');
  die();
}


if (isset($_GET['id'])) {

  $query = 'SELECT *
    FROM skills
    WHERE id = ' . $_GET['id'] . '
    LIMIT 1';
  $result = mysqli_query($connect, $query);

  if (!mysqli_num_rows($result)) {

    header('Location: skills.php');
    die();
  }

  $record = mysqli_fetch_assoc($result);
}

include('includes/header.php');

?>

<h2>Edit Skill</h2>

<form method="post">

  <label for="type">Font Awesome HTML:</label>
  <input class="form-control" type="text" name="fontawesomeHTML" id="fontawesomeHTML" value="<?php echo htmlentities($record['fontawesomeHTML']); ?>">

  <br>

  <label for="type">Type:</label>
  <input class="form-control" type="text" name="type" id="type" value="<?php echo htmlentities($record['type']); ?>">

  <br>

  <label for="details">Details:</label>
  <textarea class="form-control" type="text" name="details" id="details" rows="100"><?php echo htmlentities($record['details']); ?></textarea>

  <script>
    ClassicEditor
      .create(document.querySelector('#details'))
      .then(editor => {
        console.log(editor);
      })
      .catch(error => {
        console.error(error);
      });
  </script>

  <br>

  <label for="sequence">Sequence:</label>
  <input class="form-control" type="number" name="sequence" id="sequence" value="<?php echo htmlentities($record['sequence']); ?>">

  <br>

  <input type="submit" value="Edit Skill">

</form>

<p><a href="skills.php"><i class="fas fa-arrow-circle-left"></i> Return to Skills List</a></p>


<?php

include('includes/footer.php');

?>