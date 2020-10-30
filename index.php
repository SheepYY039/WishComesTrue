<?php

require_once('./settings.php');
require_once('./login.php');
$login_url = 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online';
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/style.css" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,500;1,400;1,500&display=swap" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Wish Comes True</title>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#body').load('about.html');
      $('#about').click(function() {
        $('#body').load('about.html');
      });
      $('#donate').click(function() {
        $('#body').load('donate.html');
      });
      $('#volunteer').click(function() {
        $('#body').load('volunteer.html');
      });
      $('.nav-item a').on('click', function() {
        $('.nav-item a').removeClass('active');
        $(this).addClass('active');
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      var random_images_array = [
        'avatar2.png',
        'avatar5.png',
        'avatar6.png',
        'img_avatar.png',
        'img_avatar2.png',
      ];

      path = './avatar/'; // default path here
      var num = Math.floor(Math.random() * random_images_array.length);
      var img = random_images_array[num];
      var image = document.getElementById('user');
      console.log(image);
      if (image.src.match('#')) {
        image.src = path + img;
      }
    });
  </script>
</head>

<body>
  <header>
    <img src="./images/icon.png" alt="Logo" />
    <h1>Wish Comes True HK</h1>

    <div class="btn-container">
      <button class="btn" id="button">Modal</button>
    </div>
    <div class="profile">
      <div class="dropdown _img">
        <?php if (isset($_SESSION['id'])) { ?>
          <img class="avatar" src="<?php echo $_SESSION['picture']; ?>" alt="<?php echo $_SESSION['name']; ?>">
          <div class="dropdown-content _info">
            <ul>
              <li><i class="fas fa-user fa-lg"></i><?php echo $_SESSION['name']; ?></li>
              <li>
                <i class="fas fa-envelope fa-lg"></i><?php echo $_SESSION['email']; ?>
              </li>
              <li class="withA">
                <a href="./logout.php"><i class="fas fa-sign-out-alt fa-lg"></i> Logout</a>
              </li>
            </ul>
          </div>
        <?php } else { ?>
          <img class="avatar" src="#" alt="User" />
          <div class="dropdown-content _info">
            <ul>
              <li class="withA">
                <a href="<?= $login_url ?>"><i class="fab fa-google fa-lg"></i> Login with Google</a>
              </li>
            </ul>
          </div>
        <?php } ?>
      </div>
    </div>
  </header>
  <section class="body">
    <div class="filters">
      <div class="filter__title">
        <span>
          <h2>Filters</h2>
        </span>
      </div>
      <div class="search">
        <form action="">
          <label for="search">
            <span class="fa fa-search"></span>
          </label>
          <input type="search" placeholder="Search..." name="search" id="search" />
        </form>
      </div>
      <div class="minority-groups">
        <h3>Minority Groups</h3>
        <form action="">
          <label class="checkbox__label">
            Children
            <input type="checkbox" id="children" name="minority-groups" value="children" />
            <span class="checkbox__custom"></span>
          </label>
          <label class="checkbox__label">
            Homeless
            <input type="checkbox" id="homeless" name="minority-groups" value="homeless" />
            <span class="checkbox__custom"></span>
          </label>
          <label class="checkbox__label">
            Elderly
            <input type="checkbox" id="elderly" name="minority-groups" value="elderly" />
            <span class="checkbox__custom"></span>
          </label>
          <label class="checkbox__label">
            Low Income
            <input type="checkbox" id="low-income" name="minority-groups" value="low-income" />
            <span class="checkbox__custom"></span>
          </label>
        </form>
      </div>
      <div class="donating-types">
        <h3>Donating Types</h3>
        <form action="">
          <label class="checkbox__label">
            Funding
            <input type="checkbox" id="funding" name="donating-types" value="funding" />
            <span class="checkbox__custom"></span>
          </label>
          <label class="checkbox__label">
            Second Hand
            <input type="checkbox" id="second-hand" name="donating-types" value="second-hand" />
            <span class="checkbox__custom"></span>
          </label>
          <label class="checkbox__label">
            Food
            <input type="checkbox" id="food" name="donating-types" value="food" />
            <span class="checkbox__custom"></span>
          </label>
        </form>
      </div>
      <div class="project-types">
        <h3>Project Types</h3>
        <form action="">
          <table>
            <tr>
              <td>
                <label class="checkbox__label">
                  Individual
                  <input type="checkbox" id="individual" name="project-types" value="individual" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
              <td>
                <label class="checkbox__label">
                  Group
                  <input type="checkbox" id="group" name="project-types" value="group" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
            </tr>
            <tr>
              <td>
                <label class="checkbox__label">
                  Reachable
                  <input type="checkbox" id="reachable" name="project-types" value="reachable" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
              <td>
                <label class="checkbox__label">
                  Reach
                  <input type="checkbox" id="reach" name="project-types" value="reach" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
            </tr>
            <tr>
              <td>
                <label class="checkbox__label">
                  Short
                  <input type="checkbox" id="short" name="project-types" value="short" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
              <td>
                <label class="checkbox__label">
                  Long
                  <input type="checkbox" id="long" name="project-types" value="long" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
            </tr>
            <tr>
              <td>
                <label class="checkbox__label">
                  New
                  <input type="checkbox" id="new" name="project-types" value="new" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
              <td>
                <label class="checkbox__label">
                  Old
                  <input type="checkbox" id="old" name="project-types" value="old" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
    <section class="content">
      <ul class="nav">
        <li class="nav-item">
          <a href="#" class="active" id="about">ABOUT US</a>
        </li>
        <li class="nav-item"><a href="#" id="donate">DONATE</a></li>
        <li class="nav-item"><a href="#" id="volunteer">VOLUNTEER</a></li>
      </ul>

      <section id="body">

      </section>
    </section>
  </section>

  <div class="modal-background">
    <div class="modal">
      <div class="modal-cancel" id="close">x</div>
      <div class="modal-content">
        <h2>&nbsp Request A Wish<br></h2>
        <form id="formal" name="formal" method="get" action="./processwishes.php" target="modal-content">
          <table style="width:100%">
            <tr>
              <td>
                <h3>&nbsp Organization</h3>
              </td>
            </tr>
            <tr>
              <td><label for="name">&nbsp Organization Name:</label></td>
              <td><input type="text" id="name" name="name" value=""><br></td>
            </tr>
            <tr>
              <td><label for="phone">&nbsp Phone Number:</label> </td>
              <td><input type="tel" id="phone" name="phone" value=""><br></td>
            </tr>
            <tr>
              <td><label for="email">&nbsp Email Address:</label></td>
              <td><input type="email" id="email" name="email" value=""><br></td>
            </tr>

            <tr>
              <td>
                <h3><br>&nbsp The Wish</h3>
              </td>
            </tr>

            <tr>
              <td>
                <p2>&nbsp Minority Groups</p2>
              </td>
            </tr>
            <tr>
              <td><label for="group1">&nbsp Homeless</label></td>
              <td><input type="checkbox" id="group1" name="group1" value="Homeless"></td>
            </tr>
            <tr>
              <td><label for="group2">&nbsp Elderly</label></td>
              <td><input type="checkbox" id="group2" name="group2" value="Elderly"></td>
            </tr>
            <tr>
              <td><label for="group3">&nbsp Low Income</label></td>
              <td><input type="checkbox" id="group3" name="group3" value="Low income"></td>
            </tr>

            <tr>
              <td><br>
                <p2>&nbsp Donating Type</p2>
              </td>
            </tr>
            <tr>
              <td><label for="donate1">&nbsp Funding</label></td>
              <td><input type="checkbox" id="donate1" name="donate1" value="Funding"></td>
            </tr>
            <tr>
              <td><label for="donate2">&nbsp Helping Hand</label></td>
              <td><input type="checkbox" id="donate2" name="donate2" value="Second hand"></td>
            </tr>
            <tr>
              <td><label for="donate3">&nbsp Food</label></td>
              <td><input type="checkbox" id="donate3" name="donate3" value="Food"></td>
            </tr>

            <tr>
              <td>
                <p2><br>&nbsp Project Type</p2>
              </td>
            </tr>
            <tr>
              <td><label for="project1">&nbsp Individual</label></td>
              <td><input type="checkbox" id="project1" name="project1" value="Individual"></td>
            </tr>
            <tr>
              <td><label for="project2">&nbsp Group</label></td>
              <td><input type="checkbox" id="project2" name="project2" value="Group"></td>
            </tr>
            <tr>
              <td><label for="project3">&nbsp Short</label></td>
              <td><input type="checkbox" id="project3" name="project3" value="Short"></td>
            </tr>
            <tr>
              <td><label for="project4">&nbsp Long</label></td>
              <td><input type="checkbox" id="project4" name="project4" value="Long"></td>
            </tr>
            <tr>
              <td><label for="start">&nbsp Start Date:<br>&nbsp(if applicable)</label></td>
              <td><input type="date" id="start" name="start"><br><br></td>
            </tr>
            <tr>
              <td><label for="end">&nbsp End Date:<br>&nbsp (if applicable)</label></td>
              <td><input type="date" id="end" name="end"><br><br></td>
            </tr>
            <tr>
              <td><br>&nbsp Additional Information:</td>
              <td><textarea name="comment" rows="5" cols="40" value=""></textarea></td>
            </tr>
            <tr>
              <td>&nbsp&nbsp<input type="submit" value="Enter Wish"></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>


  <script type="text/javascript">
    document.getElementById('button').addEventListener("click", function() {
      document.querySelector('.modal-background').style.display = "flex";
    });

    document.getElementById('close').addEventListener("click", function() {
      document.querySelector('.modal-background').style.display = "none";
    });
  </script>
  <script type="text/javascript">
    var random_images_array = ["avatar2.png", "avatar5.png", "avatar6.png", "img_avatar.png", "img_avatar2.png"];

    function getRandomImage(imgAr, path) {
      path = path || './avatar/'; // default path here
      var num = Math.floor(Math.random() * imgAr.length);
      var img = imgAr[num];
      var imgStr = '<img src="' + path + img + '" alt = "User">';
      document.write(imgStr);
      document.close();
    }
  </script>
</body>

</html>