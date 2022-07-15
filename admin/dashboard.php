<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

secure();

include('includes/header.php');

?>

<ul id="dashboard">
  <li>
    <a href="contactForms.php">
      <div class="dashboard-item">
      Contact Form
      </div>
    </a>
  </li>
  <li>
    <a href="textContents.php">
    <div class="dashboard-item">
      Manage Text Content
    </div>
    </a>
  </li>
  <li>
    <a href="experiences.php">
    <div class="dashboard-item">
      Manage Experience
    </div>
    </a>
  </li>
  <li>
    <a href="qualifications.php">
    <div class="dashboard-item">
      Manage Qualifications
    </div>
    </a>
  </li>
  <li>
    <a href="skills.php">
    <div class="dashboard-item">
      Manage Skills
    </div>
    </a>
  </li>
  <li>
    <a href="socialLinks.php">
    <div class="dashboard-item">
      Manage Social Media Links
    </div>
    </a>
  </li>
  <li>
    <a href="projects.php">
    <div class="dashboard-item">
      Manage Projects
    </div>
    </a>
  </li>
  <li>
    <a href="users.php">
    <div class="dashboard-item">
      Manage Users
    </div>
    </a>
  </li>
  <li>
    <a href="logout.php">
    <div class="dashboard-item">
      Logout
    </div>
    </a>
  </li>
</ul>

<?php

include('includes/footer.php');

?>