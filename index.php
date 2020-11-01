<?php

require_once('./settings.php');
require_once('./login.php');
$login_url = 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online';
$random_images_array = array(
  'avatar2.png',
  'avatar5.png',
  'avatar6.png',
  'img_avatar.png',
  'img_avatar2.png'
);
$avatar = array_rand($random_images_array, 1);
?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
    integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous" />

  <link rel="icon" type="image/png" href="./favicon.png" />
  <link rel="shortcut icon" href="./favicon.png" type="image/x-icon" />

  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,500;1,400;1,500&display=swap"
    rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Wish Comes True</title>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#body').load('./about.html');
    $('#about').click(function() {
      $('#body').load('./about.html');
    });
    $('#donate').click(function() {
      $('#body').load('./donate.html');
    });
    $('#volunteer').click(function() {
      $('#body').load('./volunteer.php');
    });
    $('.nav-item a').on('click', function() {
      $('.nav-item a').removeClass('active');
      $(this).addClass('active');
    });
  });
  </script>
</head>


<body>
  <header>
    <img height="100%" src="./images/logo.png" alt="Logo" />
    <h1>Wish Comes True HK</h1>
    <?php if (isset($_SESSION['id'])) { ?>
    <div class="side-container">
      <button class="btn" id="button">Submit a Wish</button>
    </div>
    <?php } else { ?>
    <div class="side-container">
      <button class="btn" id="button" disabled>Please login to Submit a Wish &rarr; </button>
    </div>
    <?php } ?>
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
        <img class="avatar" src="<?php echo "./avatar/" . $random_images_array[$avatar]; ?>" alt="User" />
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
    <div class="burger">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
    </div>
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
            <input type="checkbox" id="children" name="minority-group-children" value="children" />
            <span class="checkbox__custom"></span>
          </label>
          <label class="checkbox__label">
            Homeless
            <input type="checkbox" id="homeless" name="minority-group-homeless" value="homeless" />
            <span class="checkbox__custom"></span>
          </label>
          <label class="checkbox__label">
            Elderly
            <input type="checkbox" id="elderly" name="minority-group-elderly" value="elderly" />
            <span class="checkbox__custom"></span>
          </label>
          <label class="checkbox__label">
            Low Income
            <input type="checkbox" id="low-income" name="minority-group-low-income" value="low-income" />
            <span class="checkbox__custom"></span>
          </label>
          <label class="checkbox__label">
            Others
            <input type="checkbox" id="m-others" name="minority-group-others" value="others" />
            <span class="checkbox__custom"></span>
          </label>
        </form>
      </div>
      <div class="donating-types">
        <h3>Donating Types</h3>
        <form action="">
          <label class="checkbox__label">
            Funding
            <input type="checkbox" id="funding" name="donating-type-funding" value="funding" />
            <span class="checkbox__custom"></span>
          </label>
          <label class="checkbox__label">
            Second Hand
            <input type="checkbox" id="second-hand" name="donating-type-second-hand" value="second-hand" />
            <span class="checkbox__custom"></span>
          </label>
          <label class="checkbox__label">
            Food
            <input type="checkbox" id="food" name="donating-type-food" value="food" />
            <span class="checkbox__custom"></span>
          </label>

          <label class="checkbox__label">
            Others
            <input type="checkbox" id="d-others" name="donating-type-others" value="others" />
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
                  <input type="checkbox" id="individual" name="project-type-individual" value="individual" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
              <td>
                <label class="checkbox__label">
                  Group
                  <input type="checkbox" id="group" name="project-type-group" value="group" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
            </tr>
            <tr>
              <td>
                <label class="checkbox__label">
                  Reachable
                  <input type="checkbox" id="reachable" name="project-type-reachable" value="reachable" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
              <td>
                <label class="checkbox__label">
                  Reach
                  <input type="checkbox" id="reach" name="project-type-reach" value="reach" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
            </tr>
            <tr>
              <td>
                <label class="checkbox__label">
                  Short
                  <input type="checkbox" id="short" name="project-type-short" value="short" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
              <td>
                <label class="checkbox__label">
                  Long
                  <input type="checkbox" id="long" name="project-type-long" value="long" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
            </tr>
            <tr>
              <td>
                <label class="checkbox__label">
                  New
                  <input type="checkbox" id="new" name="project-type-new" value="new" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
              <td>
                <label class="checkbox__label">
                  Old
                  <input type="checkbox" id="old" name="project-type-old" value="old" />
                  <span class="checkbox__custom"></span>
                </label>
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
    <section class="content">
      <nav>
        <div class="nav-parent">
          <div class="nav-dropdown" id="nav-dropdown">
            <div class="dropdown-btn">
              <p>DROPDOWN</p>
            </div>

            <ul id="dropdown-content">
              <a href="#" id="about-dropdown">ABOUT US</a>
              <a href="#" id="donate-dropdown">DONATE</a>
              <a href="#" id="volunteer-dropdown">VOLUNTEER</a>
            </ul>
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a href="#" class="active" id="about">ABOUT US</a>
          </li>
          <li class="nav-item"><a href="#" id="donate">DONATE</a></li>
          <li class="nav-item"><a href="#" id="volunteer">VOLUNTEER</a></li>
        </ul>
      </nav>
      <section id="body"></section>
    </section>
  </section>

  <script type="text/javascript">
  document.getElementById('nav-dropdown').addEventListener('click', function() {
    var element = document.getElementById("dropdown-content");
    element.classlist.toggle("open");
  });
  </script>

  <div class="new modal-background">
    <div class="modal">
      <div class="modal-cancel" id="close"></div>
      <div class="modal-content">
        <h2>&nbsp Request A Wish</h2>
        <form id="formal" name="formal" method="get" action="./processwishes.php" target="modal-content">
          <h3>&nbsp Organization</h3>

          <div class="form-input-material">
            <label for="name">&nbsp Organization Name:</label>
            <?php if (isset($_SESSION['id'])) { ?>
            <input class="form-control-material" required type="text" id="name" name="name"
              value="<?php echo $_SESSION['name'] ?>" />
            <?php } else { ?>
            <input class="form-control-material" required type="text" id="name" name="name" value="" />
            <?php } ?>

          </div>

          <div class="form-input-material">
            <label for="phone">&nbsp Phone Number:</label>

            <input class="form-control-material" type="tel" id="phone" name="phone" value="" />
          </div>

          <div class="form-input-material">
            <label for="email">&nbsp Email Address:</label>

            <?php if (isset($_SESSION['id'])) { ?>
            <input class="form-control-material" required type="email" id="email" name="email"
              value="<?php echo $_SESSION["email"] ?>" />
            <?php } else { ?>
            <input class="form-control-material" required type="email" id="email" name="email" value="" />
            <?php } ?>


          </div>

          <h3>&nbsp The Wish</h3>
          <div class="form-input-material">
            <label for="phone">&nbsp Name of Wish</label>

            <input class="form-control-material" required type="wish" id="wish" name="wish" value="" />
          </div>

          <div class="form-input-material">
            <label for="district">&nbsp District of event: &nbsp (if applicable)</label>

            <input class="form-input-material" type="district" id="district" name="district" value="" />
          </div>

          <div class="form-input-material">
            <label for="starttime">&nbsp Event time: &nbsp (if applicable)</label>

            <input class="form-input-material" type="time" id="starttime" name="starttime" value="" />
          </div>

          <h4>&nbsp Minority Groups</h4>

          <div class="container check__group">
            <label class="checkbox__label" for="minority-children">&nbsp Children<input type="checkbox"
                id="minority-children" name="minority[]" value="Children" /><span
                class="checkbox__custom"></span></label>

            <label class="checkbox__label" for="minority-homeless">&nbsp Homeless
              <input type="checkbox" id="minority-homeless" name="minority[]" value="Homeless" />
              <span class="checkbox__custom"></span>
            </label>

            <label class="checkbox__label" for="minority-elderly">&nbsp Elderly<input type="checkbox"
                id="minority-elderly" name="minority[]" value="Elderly" /><span class="checkbox__custom"></span></label>

            <label class="checkbox__label" for="minority-low-income">&nbsp Low Income<input type="checkbox"
                id="minority-low-income" name="minority[]" value="Low income" /><span
                class="checkbox__custom"></span></label>

            <label class="checkbox__label" for="minority-others">&nbsp Others<input type="checkbox" id="minority-others"
                name="minority[]" value="Others" /><span class="checkbox__custom"></span></label>
          </div>

          <h4>&nbsp Donating Type</h4>

          <div class="container check__group">
            <label class="checkbox__label" for="donate-funding">&nbsp Funding<input type="checkbox" id="donate-funding"
                name="donation[]" value="Funding" /><span class="checkbox__custom"></span></label>

            <label class="checkbox__label" for="donate-second-hand">&nbsp Second Hand<input type="checkbox"
                id="donate-second-hand" name="donation[]" value="Second hand" /><span
                class="checkbox__custom"></span></label>

            <label class="checkbox__label" for="donate-food">&nbsp Food<input type="checkbox" id="donate-food"
                name="donation[]" value="Food" /><span class="checkbox__custom"></span></label>

            <label class="checkbox__label" for="donate-others">&nbsp Others<input type="checkbox" id="donate-others"
                name="donation[]" value="Others" /><span class="checkbox__custom"></span></label>
          </div>

          <div class="form-input-material">
            <label for="money">&nbsp Donation required(HK$): &nbsp (if applicable)</label>

            <input class="form-input-material" type="money" id="money" name="money" value="" />
          </div>

          <div class="form-input-material">
            <label for="people">&nbsp Amount of people required: &nbsp (if applicable)</label>

            <input class="form-input-material" type="people" id="people" name="people" value="" />
          </div>

          <h4>&nbsp Project Type</h4>

          <div class="container">
            <label class="checkbox__label" for="project-individual">&nbsp Individual<input type="checkbox"
                id="project-individual" name="project[]" value="Individual" /><span
                class="checkbox__custom"></span></label>

            <label class="checkbox__label" for="project-group">&nbsp Group<input type="checkbox" id="project-group"
                name="project[]" value="Group" /><span class="checkbox__custom"></span></label>

            <label class="checkbox__label" for="project-short">&nbsp Short<input type="checkbox" id="project-short"
                name="project[]" value="Short" /><span class="checkbox__custom"></span></label>

            <label class="checkbox__label" for="project-long">&nbsp Long
              <input type="checkbox" id="project-long" name="project[]" value="Long" /><span
                class="checkbox__custom"></span></label>
          </div>

          <div class="container">
            <label class="date__label" for="start">
              <h4>&nbsp Start Date:&nbsp(if applicable)</h4>
            </label>
            <input type="date" id="start" name="start" />
          </div>

          <div class="container">
            <label class="date__label" for="end">
              <h4>&nbsp End Date: &nbsp (if applicable)</h4>
            </label>
            <input type="date" id="end" name="end" />
          </div>

          <div class="container__box">
            <h4>&nbsp Additional Information:</h4>
            <textarea name="comment" rows="5" cols="40" value=""></textarea>
          </div>

          <div class="button_cont" align="center">
            <button class="btn btn__ani" type="submit" value="Enter Wish">
              Enter Wish
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  document.getElementById('button').addEventListener('click', function() {
    document.querySelector('.modal-background.new').style.display = 'flex';
  });

  document.getElementById('close').addEventListener('click', function() {
    document.querySelector('.modal-background.new').style.display = 'none';
  });


  $('div.burger').on('click', function() {
    $('.filters').toggleClass('clicked');
    $(this).toggleClass('clicked');
  });
  </script>
</body>

</html>