<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

if (isset($_POST['type'])) {

  if ($_POST['details'] and $_POST['sequence'] and $_POST['fontawesomeHTML']) {
    echo '<h3>'.$_POST['details'].'</h3>';
    $query = 'INSERT INTO skills (
        fontawesomeHTML,
        type,
        details,
        sequence
      ) VALUES (
         "' . mysqli_real_escape_string($connect, $_POST['fontawesomeHTML']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['type']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['details']) . '",
         "' . mysqli_real_escape_string($connect, $_POST['sequence']) . '"
      )';
    mysqli_query($connect, $query);

    set_message('Skill has been added');
  }

  header('Location: skills.php');
  die();
}

include('includes/header.php');

?>

<h2>Add Skill</h2>

<form method="post">

  <label for="fontawesomeHTML">Font Awesome HTML:</label>
  <input class="form-control" type="text" name="fontawesomeHTML" id="fontawesomeHTML">

  <br>

  <label for="type">Type:</label>
  <input class="form-control" type="text" name="type" id="type">

  <br>

  <label for="details">Details:</label>
  <textarea class="form-control" type="text" name="details" id="details" rows="100"></textarea>

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
  <input class="form-control" type="number" name="sequence" id="sequence">

  <br>

  <input type="submit" value="Add Skill">

</form>

<p><a href="skills.php"><i class="fas fa-arrow-circle-left"></i> Return to Skills List</a></p>


<?php

include('includes/footer.php');

?>