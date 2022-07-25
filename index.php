<?php

include('admin/includes/database.php');
include('admin/includes/config.php');
include('admin/includes/functions.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script async defer src="https://kit.fontawesome.com/08690c32d6.js" crossorigin="anonymous"></script>
    <script async defer src="js/typed.js"></script>
    <script async defer src="js/script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitesh Patel</title>
    <link rel="icon" href="images/favicon.svg">
    <!-- <link rel="icon" type="image/x-icon" href="images/favicon.ico"> -->
</head>

<body>
    <header id="header" class="header">
        <div id="loader"></div>
        <nav class="navigation">
            <a href="#" id="logo-container">
                <svg id="logo-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="75" height="90" viewBox="0 0 75 90">
                    <g transform="translate(5,5)">
                        <path d="M0,0 65,0 65,80 0,80 0,-2.5" class="path loader-rectangle"></path>
                    </g>
                    <text x="13" y="67">H</text>
                </svg>
                <div id="logo-text">
                    <p>Hitesh Patel</p>
                    <p>Web Developer</p>
                </div>
            </a>
            <div class="nav-links">
                <ul>
                    <li><a href="#aboutme">About</a></li>
                    <li><a href="#skills">Skills</a></li>
                    <li><a href="#experience">Experience</a></li>
                    <li><a href="#projects">Work</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <div class="resume-link">
                    <a href="#">Resume</a>
                </div>
            </div>
            <button id="hamburger">
                <svg id="hamburger-icon" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 32 32">
                    <path d="M 4 7 L 4 9 L 28 9 L 28 7 Z M 4 15 L 4 17 L 28 17 L 28 15 Z M 4 23 L 4 25 L 28 25 L 28 23 Z">
                    </path>
                </svg>
                <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 32 32">
                    <path d="M 7.21875 5.78125 L 5.78125 7.21875 L 14.5625 16 L 5.78125 24.78125 L 7.21875 26.21875 L 16 17.4375 L 24.78125 26.21875 L 26.21875 24.78125 L 17.4375 16 L 26.21875 7.21875 L 24.78125 5.78125 L 16 14.5625 Z">
                    </path>
                </svg>
            </button>

            <aside id="right-menu">
                <nav>
                    <ol>
                        <li><a href="#aboutme">About</a></li>
                        <li><a href="#skills">Skills</a></li>
                        <li><a href="#experience">Experience</a></li>
                        <li><a href="#projects">Work</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ol>
                    <a href="#" class="resume-link">Resume</a>
                </nav>
            </aside>
        </nav>
    </header>

    <div id="left">
        <?php

        $socialquery = 'SELECT *
            FROM socialMedia
            ORDER BY sequence';
        $result = mysqli_query($connect, $socialquery);

        ?>
        <ul id="left-list">
        <?php while ($socialMediaLink = mysqli_fetch_assoc($result)) : ?>
            <li>
                <a class="social" href="<?php echo $socialMediaLink['url']; ?>">
                <?php echo $socialMediaLink['logo']; ?>
                </a>
            </li>
            <?php endwhile ?>
        </ul>
        <svg id="left-line" height="200" width="40">
            <line x1="20" y1="20" x2="20" y2="200"></line>
        </svg>
    </div>

    <div id="right">
        <a href="mailto:hites.297@gmail.com">hites.297@gmail.com</a>
        <svg id="right-line" height="200" width="40">
            <line x1="20" y1="20" x2="20" y2="200"></line>
        </svg>
    </div>

    <main>
        <section id="hero-section">
            <?php

            $heroquery = 'SELECT *
                FROM content
                WHERE type = "Hero"
                LIMIT 1';
            $result = mysqli_query($connect, $heroquery);
            $herocontent = mysqli_fetch_assoc($result);

            ?>
            <div>
                <h1>Hi, my name is</h1>
            </div>
            <div>
                <h2>Hitesh Patel.</h2>
            </div>
            <div>
                <h3>I'm a <span id="role-title" class="">Web Developer</span></h3>
            </div>
            <div>
                <?php echo $herocontent['content']; ?>
            </div>
            <div>
                <a id="hire-me" href="https://www.linkedin.com/in/hitesh-patel-dev/" target="_blank">Hire Me!</a>
            </div>

        </section>
        <section id="aboutme">
            <?php

            $aboutMeQuery = 'SELECT *
                 FROM content
                 WHERE type = "AboutMe"
                    LIMIT 1';
            $result = mysqli_query($connect, $aboutMeQuery);
            $aboutMecontent = mysqli_fetch_assoc($result);

            ?>
            <h2 class="section-headings">
                About Me
            </h2>
            <div class="aboutme-content reveal">
                <div id="aboutme-text">
                    <?php echo $aboutMecontent['content']; ?>
                    <div id="credential-details">
                        <?php
                        $qualificationsQuery = 'SELECT *
                            FROM qualifications
                            ORDER BY yearCompleted DESC';
                        $result = mysqli_query($connect, $qualificationsQuery);
                        // $qualificationsList = mysqli_fetch_assoc($result);

                        ?>
                        <h3>Qualifications</h3>
                        <ul class="credentials-list">
                            <?php while ($credential = mysqli_fetch_assoc($result)) : ?>
                                <li class="credential-item">
                                    <div class="credential-title">
                                        <i class="fa-solid fa-graduation-cap"></i>
                                        <h4><?php echo $credential['credential'] . ', ' . $credential['yearCompleted']; ?></h4>
                                    </div>
                                    <?php echo $credential['details']; ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
                <div id="aboutme-img-container">
                    <img src="images/me.jpg" alt="photo of Hitesh Patel" width="300">
                </div>
            </div>

        </section>
        <section id="skills">
            <div id="credential-details">

                <?php
                $skillsQuery = 'SELECT *
                            FROM skills
                            ORDER BY sequence';
                $skills = mysqli_query($connect, $skillsQuery);

                ?>
                <h2 class="section-headings">
                    Skills
                </h2>
                <ul id="skills-list" class="reveal">
                    <?php while ($skill = mysqli_fetch_assoc($skills)) : ?>
                        <li class="skills-item">
                            <?php echo $skill['fontawesomeHTML']; ?>
                            <h3><?php echo $skill['type']; ?></h3>
                            <?php echo $skill['details']; ?>
                        </li>
                    <?php endwhile; ?>
                </ul>

        </section>
        <section id="experience">
            <h2 class="section-headings">
                Experience
            </h2>
            <?php
            $experienceQuery = 'SELECT *
                            FROM experience
                            ORDER BY startDate';
            $experiences = mysqli_query($connect, $experienceQuery);
            $experiencerray = array();

            while ($row = mysqli_fetch_assoc($experiences)) {
                $experiencerray[] = $row;
            }

            ?>
            <div class="reveal" id="experience-content">
                <div id="company-list">
                    <?php for ($i = 0; $i < count($experiencerray); $i++) : ?>
                        <button data-tab="<?php echo $i + 1; ?>" class="tabs"><?php echo $experiencerray[$i]['companyName']; ?></button>
                        <!-- <button data-tab="2" class="tabs">ABC Software</button> -->
                    <?php endfor; ?>
                    <div id="company-selector"></div>
                </div>
                <div id="role-description">
                    <?php for ($i = 0; $i < count($experiencerray); $i++) : ?>
                        <div class="content__section" data-tab="<?php echo $i + 1; ?>">
                            <h3>
                                <span><?php echo $experiencerray[$i]['position']; ?></span>
                                <span class="company"><?php echo '@' . $experiencerray[$i]['companyName']; ?></span>
                            </h3>
                            <p class="duration"><?php echo date_format(date_create($experiencerray[$i]['startDate']), 'M Y') . ' - ' . date_format(date_create($experiencerray[$i]['endDate']), 'M Y'); ?></p>
                            <?php echo $experiencerray[$i]['responsibilities']; ?>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </section>

        <section id="projects">
            <h2 class="section-headings">
                Projects
            </h2>
            <?php
            $projectsQuery = 'SELECT *
                            FROM projects
                            ORDER BY sequence';
            $projects = mysqli_query($connect, $projectsQuery);
            $projectsarray = array();

            while ($project = mysqli_fetch_assoc($projects)) {
                $projectsarray[] = $project;
            }

            ?>
            <ul class="reveal" id="project-list">
                <?php for ($i = 0; $i < count($projectsarray); $i++) : ?>
                    <li class="project-list-item">
                        <div class="project-content">
                            <div class="proj-image-container <?php if (($i + 1) % 2 == 0) echo 'right'; ?>">
                                <a href="<?php echo $projectsarray[$i]['liveUrl']; ?>" target="_blank">
                                    <!-- <img src="images/project1.jpg" alt="a screen shot of an web app displaying a pie chart of an example survey"> -->
                                    <img src="admin/image.php?type=project&id=<?php echo $projectsarray[$i]['id']; ?>&width=600&height=600&format=inside">
                                </a>
                            </div>
                            <div class="project-text <?php echo (($i + 1) % 2) == 0 ? 'text-left' : 'right text-right' ?>">
                                <p class="project-head">Featured Project</p>
                                <h3 class="project-title"><?php echo $projectsarray[$i]['title']; ?></h3>
                                <div class="project-details">
                                    <?php echo $projectsarray[$i]['description']; ?>
                                </div>
                                <?php
                                $technologies = explode(",", $projectsarray[$i]['technologies']);
                                ?>
                                <ul class="project-tech-list">
                                    <?php foreach ($technologies as $key => $technology) : ?>
                                        <li><?php echo trim($technology); ?></li>
                                    <?php endforeach ?>
                                    <!-- <li>C#</li>
                                <li>.Net Core</li>
                                <li>MVC</li>
                                <li>Entity Framework</li>
                                <li>API</li> -->
                                </ul>
                                <div class="project-links">
                                    <a class="git" href="<?php echo $projectsarray[$i]['gitUrl']; ?>" target="_blank">
                                        <i class="fa-brands fa-github"></i>
                                    </a>
                                    <a class="external-link" href="<?php echo $projectsarray[$i]['liveUrl']; ?>" target="_blank">
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endfor; ?>
            </ul>
        </section>

        <section id="contact">
            <h2 class="section-headings">
                Contact
            </h2>
            <div class="reveal" id="contact-content">
                <form id="contact-form" method="post">
                    <p id="contact-message">Have a question or want to work together? </p>
                    <input type="text" class="form-control" id="name" placeholder="NAME" name="name" value="" required>
                    <input type="email" class="form-control" id="email" placeholder="EMAIL" name="email" value="" required>
                    <textarea class="form-control" rows="10" id="message" placeholder="MESSAGE" name="message" required></textarea>
                    <input id="submit-button" type="submit" value="Submit">
                    
                </form>
            </div>
        </section>

    </main>

    <footer>
        <div id="footer-content">
            <div>Built By Hitesh Patel</div>
        </div>
    </footer>
</body>

</html>