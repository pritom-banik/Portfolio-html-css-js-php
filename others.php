<?php include_once "connection.php" ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pritom Banik's Portfolio</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="stylesheet" href="others.css" />
  <script src="https://kit.fontawesome.com/6ef185bef2.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="main">
    <!-- ////////////////////////////Sidebar ////////////////////-->
    <div class="intro">
      <img src="images/Pritom_Banik_CSE2.jpg" alt="Profile Picture" class="profile-pic" />
      <div class="name">
        <div class="title">Pritom Banik</div>
        <div class="subtitle">Student || CSE, KUET</div>
      </div>
      <div class="about">
        <p class="details">
          Hi, I’m Pritom Banik.
          I’m pursuing a Bachelor’s degree in Computer Science and Engineering at Khulna University of Engineering &
          Technology. My interests span Machine Learning, Deep Learning, Web Development, and Quantum Computing. As a
          passionate tech enthusiast, I’m always eager to explore emerging technologies, sharpen my skills, and take on
          new challenges that push me to grow.
        </p>
        <a href="https://drive.google.com/uc?export=download&id=1AWEB9HugiGkrWIW1K5QXtcRvQ9g88qum"
          download="CV_Pritom_Banik.pdf">
          <button class="btn-cv">Download CV</button>
        </a>
        <div class="socialMedia">
          <a href="https://github.com/UnpolishedNoob" target="_blank"><img src="images/github.png" alt="GitHub Logo"
              class="social-icon" /></a>
          <a href="https://www.linkedin.com/in/pritom-banik-272828250/" target="_blank"><img src="images/linkedin.png"
              alt="LinkedIn Logo" class="social-icon" /></a>
          <a href="https://discord.com/users/1062709844311801886" target="_blank"><img src="images/discord.png"
              alt="Discord Logo" class="social-icon" /></a>
          <a href=""><img src="images/facebook.png" alt="Facebook Logo" class="social-icon" /></a>
          <a href=""><img src="images/instagram.png" alt="Instagram Logo" class="social-icon" /></a>
          <a href=""><img src="images/whatsapp.png" alt="Whatsapp Logo" class="social-icon" /></a>
          <a href=""><img src="images/x.png" alt="X Logo" class="social-icon" /></a>
          <a href="mailto:banikpritom321@gmail.com"><img src="images/email.png" alt="Email Logo"
              class="social-icon" /></a>
        </div>
      </div>
    </div>

    <!-- Main -->
    <div class="all">
      <!-- Top Nav /////////////////////////// -->
      <div id="topNavBar" class="navigationBar">
        <a href="home.php" class="nav-item">Home</a>
        <a href="resume.php" class="nav-item">Resume</a>
        <a href="projects.php" class="nav-item">Projects</a>
        <a href="coding.php" class="nav-item">Coding</a>
        <a href="others.php" class="nav-item active">Others</a>
      </div>

      <!-- Bottom Navigation ================================================= -->
      <div class="bottom-navigationBar">
        <a href="home.php" class="b-nav-item">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="icon">
            <path
              d="M341.8 72.6C329.5 61.2 310.5 61.2 298.3 72.6L74.3 280.6C64.7 289.6 61.5 303.5 66.3 315.7C71.1 327.9 82.8 336 96 336L112 336L112 512C112 547.3 140.7 576 176 576L464 576C499.3 576 528 547.3 528 512L528 336L544 336C557.2 336 569 327.9 573.8 315.7C578.6 303.5 575.4 289.5 565.8 280.6L341.8 72.6zM304 384L336 384C362.5 384 384 405.5 384 432L384 528L256 528L256 432C256 405.5 277.5 384 304 384z" />
          </svg>

          <span>Home</span>
        </a>

        <a href="resume.php" class="b-nav-item">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 392.533 392.533" class="icon">
            <path d="M292.396,324.849H99.879c-6.012,0-10.925,4.848-10.925,10.925c0,6.012,4.849,10.925,10.925,10.925h192.582
      c6.012,0,10.925-4.849,10.925-10.925C303.321,329.697,298.473,324.849,292.396,324.849z
      M292.396,277.01H99.879c-6.012,0-10.925,4.848-10.925,10.925c0,6.012,4.849,10.925,10.925,10.925h192.582
      c6.012,0,10.925-4.849,10.925-10.925C303.321,281.859,298.473,277.01,292.396,277.01z
      M196.137,45.834c-25.859,0-46.998,21.075-46.998,46.998c0,25.859,21.139,46.933,46.998,46.933s46.998-21.075,46.998-46.998
      S221.996,45.834,196.137,45.834z M196.137,117.851c-13.77,0-25.083-11.313-25.083-25.083c0-13.77,11.248-25.083,25.083-25.083
      s25.083,11.313,25.083,25.083C221.22,106.537,209.907,117.851,196.137,117.851z
      M258.521,163.362c-39.887-15.515-84.752-15.515-124.638,0c-13.059,5.107-21.786,18.101-21.786,32.388v44.347
      c-0.065,6.012,4.849,10.925,10.861,10.925h146.424c6.012,0,10.925-4.848,10.925-10.925V195.75
      C280.307,181.463,271.58,168.469,258.521,163.362z M258.521,229.236H133.883v-33.422c0-5.301,3.168-10.214,7.887-12.024
      c34.844-13.511,74.02-13.511,108.865,0c4.719,1.875,7.887,6.659,7.887,12.024V229.236z
      M313.083,0H131.491c-8.404,0-16.291,3.232-22.238,9.18L57.018,61.414c-5.947,5.948-9.18,13.834-9.18,22.238v277.333
      c0,17.39,14.158,31.547,31.547,31.547h233.762c17.39,0,31.547-14.158,31.547-31.547V31.547C344.501,14.158,330.343,0,313.083,0z
      M112.032,37.236v27.022H85.01L112.032,37.236z M322.715,116.816h-40.598c-6.012,0-10.925,4.849-10.925,10.925
      c0,6.012,4.848,10.925,10.925,10.925h40.598v19.394h-14.869c-6.012,0-10.925,4.848-10.925,10.925
      c0,6.012,4.849,10.925,10.925,10.925h14.869v181.139c0,5.366-4.331,9.697-9.632,9.697H79.192c-5.301,0-9.632-4.331-9.632-9.632
      V86.044h53.398c6.012,0,10.925-4.848,10.925-10.925V21.721h179.2c5.301,0,9.632,4.331,9.632,9.632V116.816z" />
          </svg>
          <span>Resume</span>
        </a>
        <a href="projects.php" class="b-nav-item">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="icon">
            <path
              d="M64 144C64 117.5 85.5 96 112 96L208 96C234.5 96 256 117.5 256 144L256 160L384 160L384 144C384 117.5 405.5 96 432 96L528 96C554.5 96 576 117.5 576 144L576 240C576 266.5 554.5 288 528 288L432 288C405.5 288 384 266.5 384 240L384 224L256 224L256 240C256 247.3 254.3 254.3 251.4 260.5L320 352L400 352C426.5 352 448 373.5 448 400L448 496C448 522.5 426.5 544 400 544L304 544C277.5 544 256 522.5 256 496L256 400C256 392.7 257.7 385.7 260.6 379.5L192 288L112 288C85.5 288 64 266.5 64 240L64 144z" />
          </svg>

          <span>Project</span>
        </a>

        <a href="coding.php" class="b-nav-item">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="icon">
            <path
              d="M392.8 65.2C375.8 60.3 358.1 70.2 353.2 87.2L225.2 535.2C220.3 552.2 230.2 569.9 247.2 574.8C264.2 579.7 281.9 569.8 286.8 552.8L414.8 104.8C419.7 87.8 409.8 70.1 392.8 65.2zM457.4 201.3C444.9 213.8 444.9 234.1 457.4 246.6L530.8 320L457.4 393.4C444.9 405.9 444.9 426.2 457.4 438.7C469.9 451.2 490.2 451.2 502.7 438.7L598.7 342.7C611.2 330.2 611.2 309.9 598.7 297.4L502.7 201.4C490.2 188.9 469.9 188.9 457.4 201.4zM182.7 201.3C170.2 188.8 149.9 188.8 137.4 201.3L41.4 297.3C28.9 309.8 28.9 330.1 41.4 342.6L137.4 438.6C149.9 451.1 170.2 451.1 182.7 438.6C195.2 426.1 195.2 405.8 182.7 393.3L109.3 320L182.6 246.6C195.1 234.1 195.1 213.8 182.6 201.3z" />
          </svg>
          <span>Coding</span>
        </a>

        <a href="others.php" class="b-nav-item active">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="icon">
            <path
              d="M320 208C289.1 208 264 182.9 264 152C264 121.1 289.1 96 320 96C350.9 96 376 121.1 376 152C376 182.9 350.9 208 320 208zM320 432C350.9 432 376 457.1 376 488C376 518.9 350.9 544 320 544C289.1 544 264 518.9 264 488C264 457.1 289.1 432 320 432zM376 320C376 350.9 350.9 376 320 376C289.1 376 264 350.9 264 320C264 289.1 289.1 264 320 264C350.9 264 376 289.1 376 320z" />
          </svg>

          <span>Others</span>
        </a>
      </div>

      <!-- Others Sections -->
      <div class="others">
        <!-- Achievements -->
        <div class="section">
          <div class="section-header" onclick="toggleWork('all-achievements','arrow-icon-achievements')">
            <span>Achievements & Extras </span>
            <i class="fa-solid fa-chevron-down" id="arrow-icon-achievements"></i>
          </div>

          <!-- ///////////////////////////////////////////// -->

          <?php
          $query = 'SELECT * FROM achievements ORDER BY id DESC';
          $result = mysqli_query($connection, $query);
          ?>

          <div class="section-content" id="all-achievements">

            <?php
            while ($row = mysqli_fetch_assoc($result)) {
              ?>

              <div class="post">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" alt="Work Image"
                  class="image" />

                <h1 class="heading"><?php echo $row['title'] ?></h1>
                <p class="description"><?php echo $row['description'] ?></p>
                <p class="duration"><?php echo $row['duration'] ?></p>
              </div><br>

              <?php
            }
            ?>

          </div>
        </div>


        <!-- Contact Me -->
        <div class="contact-form">
          <h2 class="form-title">Contact Me</h2>

          <form method="POST">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" id="name" name="name" placeholder="Enter your name" required>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea id="message" name="message" rows="4" placeholder="Your thoughts..." required></textarea>
            </div>

            <button type="submit" class="btn-submit">Send</button>
          </form>
        </div>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $username = "Portfolio-owner";
          $password = "2021";
          $connection = mysqli_connect("localhost", $username, $password, "pritom_portfolio");
          $email = $_POST['email'];
          $name = $_POST['name'];
          $message = $_POST['message'];
          $query = "INSERT INTO `contact_me` (`id`, `date`, `name`, `message`, `email`) VALUES (NULL, current_timestamp(), '$name', '$message', '$email');";
          mysqli_query($connection, $query);
        }
        ?>

      </div>
    </div>



  </div>

  <div class="settings" style="color: white; margin: 10px; display: flex; cursor: pointer"
    onclick="location.href='loginform.php'">
    <i class="fa-solid fa-gear"></i>
    <p>Admin</p>

  </div>


  <script src="js/general.js"></script>

</body>

</html>