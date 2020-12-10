<?php

require_once './settings.php';
require_once './login.php';
$login_url = 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online';
$random_images_array = array(
  'avatar2.png',
  'avatar5.png',
  'avatar6.png',
  'img_avatar.png',
  'img_avatar2.png',
);
$avatar = array_rand($random_images_array, 1);
?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Website for WishComesTrueHK" />
  <meta name="title" property="og:title" content="WishComesTrueHK" />
  <meta property="og:type" content="Website" />
  <meta name="image" property="og:image" content="https://live.staticflickr.com/65535/50646172078_c56b58ecd9_h.jpg" />
  <meta name="description" property="og:description" content="Our vision for this project is to create a website, where the wishes of minority groups are published to the public allowing volunteers to choose which ones they want to contribute to. Examples of these wishes include volunteers helping children who wish for better grades by tutoring." />
  <meta name="author" content="WishComesTrueHK Team" />


  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous" />

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="./favicon.png" />
  <link rel="shortcut icon" href="./favicon.png" type="image/x-icon" />

  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Limelight&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,500;1,400;1,500&display=swap" rel="stylesheet" />

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>


  <!-- Parallax -->
  <script src="./js/parallax.js"></script>

  <!-- Swiper -->
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <script type="application/javascript" src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <!-- Stylesheet -->
  <link rel="stylesheet" type="text/css" href="./css/style.css" />
  <link rel="stylesheet" type="text/css" href="./css/index.css">
  <title>Wish Comes True</title>
  <script type="text/javascript">
    // Nav functions
    $(document).ready(function() {

      jQuery(window).trigger('resize').trigger('scroll');
      // Laptop Nav
      $('#about').click(function() {
        window.location = './index.php';
      });
      $('#donate').click(function() {
        $('.body').load('./donate.html');
      });
      $('#volunteer').click(function() {
        $('.body').load('./volunteer.php');
      });

      // Dropdown mobile nav
      $('#about-dropdown').click(function() {
        window.location = './index.php';
      });
      $('#donate-dropdown').click(function() {
        $('.body').load('./donate.html');
      });
      $('#volunteer-dropdown').click(function() {
        $('.body').load('./volunteer.php');
      });

      // Set Active tab
      $('.nav-item a').on('click', function() {
        $('.nav-item a').removeClass('active');
        $(this).addClass('active');
      });
    });
  </script>
  <script>
    // Parallax function
    $(document).ready(function() {
      $('.parallax-window.dark').each(function() {
        var dataValue = $(this).attr('data-image-src');
        console.log(dataValue);
        $('.parallax-window').parallax({
          naturalWidth: 1280,
          naturalHeight: 718,
        });
      });
    });
  </script>
  <style type="text/css">
    tg {
      border-collapse: collapse;
      border-spacing: 0;
      margin: 0px auto;
    }

    .tg td {
      border-style: solid;
      border-width: 0px;
      font-family: roboto, sans-serif;
      font-size: 14px;
      overflow: hidden;
      padding: 10px 5px;
      word-break: normal;
    }

    .tg th {
      border-style: solid;
      border-width: 0px;
      font-family: roboto, sans-serif;
      font-size: 14px;
      font-weight: normal;
      overflow: hidden;
      padding: 10px 5px;
      word-break: normal;
    }

    .tg .tg-0lax {
      text-align: left;
      vertical-align: top;
    }

    .tg .tg-8zwo {
      font-style: italic;
      text-align: left;
      vertical-align: top;
    }

    .first {
      border-bottom: 3px solid red;
      background-image: url(./images/parallax-bg.jpg);
      background-clip: text;
      -webkit-background-clip: text;
      color: transparent;
      font-size: 122px;
      font-family: 'Limelight', cursive;
    }

    .content {
      position: absolute;
      right: 0;
    }

    .content.about_content {
      left: 0;
      width: 100vw;
    }


    .parallax-mirror {
      -webkit-transition: all ease;
      -moz-transition: all ease;
      -ms-transition: all ease;
      -o-transition: all ease;
      transition: all ease;
    }

    .parallax-mirror img,
    .parallax-window img {
      margin: 0;
      padding: 0;
    }

    @media screen and (max-width: 767px) {
      .tg {
        width: auto !important;
      }

      .tg col {
        width: auto !important;
      }

      .tg-wrap {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        margin: auto 0px;
      }
    }


    #body,
    .body {
      font-family: 'Limelight', cursive;
      margin: 0;
      padding: 0;
      /* display: block; */
    }

    @media screen and (max-width: 768px) {

      .first {
        border-bottom: none;
        font-size: 15vw;
      }

      .page .details {
        left: auto;
        transform: translateY(75px);
      }
    }

    .swiper-container {
      height: fit-content;
      width: 80%;
      padding-top: 50px;
      padding-bottom: 50px;
    }

    .swiper-slide {
      background-position: center;
      background-size: cover;
      width: 50%;
      height: auto;
      min-height: 50%;
      display: flex;
      flex-direction: column-reverse;
    }

    .swiper-container-multirow-column>.swiper-wrapper {
      flex-wrap: wrap;
      flex-direction: row;
    }

    .swiper-slide .title {
      font-size: 29px;
      font-weight: 300;
      align-self: center;
    }

    .swiper-slide .subtitle {
      font-size: 15px;
      align-self: center;
    }

    .swiper-slide .head-img img {
      margin: auto;
    }

    .swiper-slide .head-img {
      display: flex;
    }


    @media screen and (max-width: 1024px) {
      .swiper-container {
        width: 90%;
      }

      .swiper-slide .subtitle {
        font-size: 1.4vw;
      }

      .swiper-slide .title {
        font-size: 2.5vw;
      }
    }


    @media screen and (max-width: 762px) {
      .swiper-slide {
        margin: 0 !important;
        padding: 0;
      }

      .swiper-slide .subtitle {
        padding: 0;
        font-size: 2vw;
      }

      .swiper-slide .subtitle,
      .swiper-slide .title {
        transform: translateY(-12px);
      }

      .head-img {
        transition: transform 0.3s ease-out;
        transform: scale(0.8);
      }
    }

    @media screen and (max-width: 498px) {

      .page {
        transform: scale(0.7);
      }

      .swiper-container {
        width: 80%;
      }

      .swiper-slide .subtitle {
        font-size: 15px;
      }

      .swiper-slide .title {
        font-size: 29px;
      }

      .swiper-slide .subtitle,
      .swiper-slide .title {
        transform: translateY(0px);
      }

      .head-img {
        transition: transform 0.3s ease-out;
        transform: scale(1);
      }
    }

    .footer {
      padding: 0;
    }
  </style>
</head>


<body>
  <header>
    <img height="100%" style="transform: scale(2.5);" src="./images/logo.png" alt="Logo" />
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
                <a href="<?php echo $login_url; ?>"><i class="fab fa-google fa-lg"></i> Login with Google</a>
              </li>
            </ul>
          </div>
        <?php } ?>
      </div>
    </div>
  </header>
  <section class="body">

    <section class="content" style="font-family: 'Limelight', cursive; width: 100vw">
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
      <div>
        <div class="parallax-window" data-parallax="scroll" iosFix androidFix overScrollFix>
          <div class="center">
            <h1 class="first">Wish Comes True</h1>
          </div>
        </div>
        <div class="parallax-window dark" data-parallax="scroll" iosFix androidFix overScrollFix data-image-src="./images/parallax-bg.jpg">
          <div class="center">
            <h2>Our Vision</h2>
            <p>
              Our vision for this project is to create a website, where the
              wishes of minority groups are published to the public allowing
              volunteers to choose which ones they want to contribute to.
              Examples of these wishes include volunteers helping children who
              wish for better grades by tutoring.
            </p>
          </div>
        </div>
        <div class="parallax-window" data-parallax="scroll" iosFix androidFix overScrollFix>
          <div class="center">
            <h2>Meet the team!</h2>
          </div>
        </div>
        <div class="parallax-window dark" data-parallax="scroll" iosFix androidFix overScrollFix data-image-src="./images/parallax-bg.jpg">
          <div class="page">
            <div class="details">
              <h2>Arnav Kithania</h2>
              <p>Head of Wish Comes True</p>
            </div>
            <div class="hero">
              <img class="model-left modal-right" src="./images/arnav.jpg" alt="Model Left" />
            </div>
          </div>
        </div>
        <div class="parallax-window" data-parallax="scroll" iosFix androidFix overScrollFix>
          <div class="page">
            <div class="details">
              <h2>Aditi Jain</h2>
              <p>Head of Wish Comes True</p>
            </div>
            <div class="hero">
              <img class="model-left modal-right" src="./images/aditi.jpeg" alt="Model Left" />
            </div>
          </div>
        </div>
        <div class="parallax-window dark" data-parallax="scroll" iosFix androidFix overScrollFix data-image-src="./images/parallax-bg.jpg">
          <div class="center">
            <h2>Heads of Departments</h2>
          </div>
        </div>
        <div class="parallax-window" data-parallax="scroll" iosFix androidFix overScrollFix>
          <div class="swiper-container">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="title">Noshin Chowdhury</div>
                <div class="subtitle">Head of Communications & Logistics</div>
                <div class="head-img">
                  <img src="./images/noshin.jpeg" />
                </div>
              </div>
              <div class="swiper-slide">
                <div class="title">Ritika Vaswani</div>
                <div class="subtitle">Head of Communications & Logistics</div>
                <div class="head-img">
                  <img src="./images/ritika.jpeg" />
                </div>
              </div>
              <div class="swiper-slide">
                <div class="title">Jasmine Yeung</div>
                <div class="subtitle">Head of Coding</div>
                <div class="head-img">
                  <img src="./images/jasmine.jpg" />
                </div>
              </div>
              <div class="swiper-slide">
                <div class="title">Harshita Parmar</div>
                <div class="subtitle">Head of Maketing</div>
                <div class="head-img">
                  <img src="./images/harshita.jpg" />
                </div>
              </div>
              <div class="swiper-slide">
                <div class="title">Sunwoo Joo</div>
                <div class="subtitle">Head of Maketing</div>
                <div class="head-img">
                  <img src="./images/sunwoo.jpeg" />
                </div>
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
        <!-- All Members -->
        <div class="parallax-window dark" data-parallax="scroll" iosFix androidFix overScrollFix data-image-src="./images/parallax-bg.jpg">
          <div class="center">
            <h2>Our Team</h2>
            <div class="tg-wrap">
              <table class="tg">
                <thead>
                  <tr>
                    <th class="tg-0lax">Communications and Logistics</th>
                    <th class="tg-0lax">Coding</th>
                    <th class="tg-0lax">Marketing</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="tg-8zwo">Noshin CHOWDHURY</td>
                    <td class="tg-8zwo">Jasmine YEUNG</td>
                    <td class="tg-8zwo">Sunwoo JOO</td>
                  </tr>
                  <tr>
                    <td class="tg-8zwo">Ritika VASWANI</td>
                    <td class="tg-0lax">Kanav MEHTA</td>
                    <td class="tg-8zwo">Harshita PARMAR</td>
                  </tr>
                  <tr>
                    <td class="tg-0lax">Kashish NANIKRAM</td>
                    <td class="tg-0lax">Kay LAU</td>
                    <td class="tg-0lax">Hiren KHARE</td>
                  </tr>
                  <tr>
                    <td class="tg-0lax">Akshay RAMCHANDANI</td>
                    <td class="tg-0lax">Dennis CHOW</td>
                    <td class="tg-0lax">Jami CHENG</td>
                  </tr>
                  <tr>
                    <td class="tg-0lax">Jenny CHAN</td>
                    <td class="tg-0lax">Arthur CHEUNG</td>
                    <td class="tg-0lax">Kiros CHONG</td>
                  </tr>
                  <tr>
                    <td class="tg-0lax">Vyapti WADHWANEY</td>
                    <td class="tg-0lax">Manun CHAUHAAN</td>
                    <td class="tg-0lax">Roshita SAJNANI</td>
                  </tr>
                  <tr>
                    <td class="tg-0lax">Winnie PAU</td>
                    <td class="tg-0lax">Nikhil RAMCHANDANI</td>
                    <td class="tg-0lax">Sofia PAYMASTER</td>
                  </tr>
                  <tr>
                    <td class="tg-0lax">Kiki LEUNG</td>
                    <td class="tg-0lax"></td>
                    <td class="tg-0lax">Charis PAO</td>
                  </tr>
                  <tr>
                    <td class="tg-0lax">Rika KASUYA</td>
                    <td class="tg-0lax"></td>
                    <td class="tg-0lax">Diya SAMTANI</td>
                  </tr>
                  <tr>
                    <td class="tg-0lax">Ian LAI</td>
                    <td class="tg-0lax"></td>
                    <td class="tg-0lax">Mir KALYANI</td>
                  </tr>
                  <tr>
                    <td class="tg-0lax">Haysen WONG</td>
                    <td class="tg-0lax"></td>
                    <td class="tg-0lax">Anders LAM</td>
                  </tr>
                  <tr>
                    <td class="tg-0lax">Krishna VAKATI</td>
                    <td class="tg-0lax"></td>
                    <td class="tg-0lax">Jainam SANGHVI</td>
                  </tr>
                  <tr>
                    <td class="tg-0lax">Jake O'HANLON</td>
                    <td class="tg-0lax"></td>
                    <td class="tg-0lax"></td>
                  </tr>
                  <tr>
                    <td class="tg-0lax">Tin Chi LO</td>
                    <td class="tg-0lax"></td>
                    <td class="tg-0lax"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- Footer -->
        <footer>
          <div class="footer" id="footer">
            <div class="container" style="display: block">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <h4>Wish Comes True HK</h4>
                </div>
                <div class="col-lg-3 col-sm-2 col-xs-3">
                  <h3>Contact Us</h3>
                  <ul>
                    <li>
                      <a class="" href="mailto:wishcomestruehk@gmail.com">
                        wishcomestruehk@gmail.com
                      </a>
                    </li>
                    <li>
                      <a class="email" href="https://www.instagram.com/wishcomestruehk/">
                        Instagram: wishcomestruehk</a>
                    </li>
                    <br />
                    <li>
                      <p>
                        💫 Our vision is to fulfill wishes of minority groups
                      </p>
                    </li>
                    <li>
                      <p>
                        💫 Aiming to improve the lives of the less privileged
                      </p>
                    </li>
                    <li>
                      <p>💫 Founded by students from RCHK and KGV</p>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-3 col-sm-2 col-xs-3">
                  <!-- <ul>
                          <li> <h5> <a href="#" style="margin-top: 5em"> ABOUT US</a> <h5></li>
                          <li> <h5><a href="#"> CURRENT SERIES </a> <h5></li>
                          <li> <h5><a href="#"> THE HOUSE </a> <h5></li>
                          <li> <h5><a href="#"> LOOKING BACK </a> <h5></li>
                      </ul> -->
                </div>

                <!--/.row-->
              </div>
              <!--/.container-->
            </div>
            <!--/.footer-->

            <div class="footer-bottom">
              <div class="container">
                <p class="pull-left copyright">
                  Copyright © Wish Comes True HK 2020. All right reserved.
                </p>
              </div>
            </div>
            <!--/.footer-bottom-->
          </div>
        </footer>
      </div>
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
              <input class="form-control-material" required type="text" id="name" name="name" value="<?php echo $_SESSION['name'] ?>" />
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
              <input class="form-control-material" required type="email" id="email" name="email" value="<?php echo $_SESSION["email"] ?>" />
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
            <label class="checkbox__label" for="minority-children">&nbsp Children<input type="checkbox" id="minority-children" name="minority[]" value="Children" /><span class="checkbox__custom"></span></label>

            <label class="checkbox__label" for="minority-homeless">&nbsp Homeless
              <input type="checkbox" id="minority-homeless" name="minority[]" value="Homeless" />
              <span class="checkbox__custom"></span>
            </label>

            <label class="checkbox__label" for="minority-elderly">&nbsp Elderly<input type="checkbox" id="minority-elderly" name="minority[]" value="Elderly" /><span class="checkbox__custom"></span></label>

            <label class="checkbox__label" for="minority-low-income">&nbsp Low Income<input type="checkbox" id="minority-low-income" name="minority[]" value="Low income" /><span class="checkbox__custom"></span></label>

            <label class="checkbox__label" for="minority-others">&nbsp Others<input type="checkbox" id="minority-others" name="minority[]" value="Others" /><span class="checkbox__custom"></span></label>
          </div>

          <h4>&nbsp Donating Type</h4>

          <div class="container check__group">
            <label class="checkbox__label" for="donate-funding">&nbsp Funding<input type="checkbox" id="donate-funding" name="donation[]" value="Funding" /><span class="checkbox__custom"></span></label>

            <label class="checkbox__label" for="donate-second-hand">&nbsp Second Hand<input type="checkbox" id="donate-second-hand" name="donation[]" value="Second hand" /><span class="checkbox__custom"></span></label>

            <label class="checkbox__label" for="donate-food">&nbsp Food<input type="checkbox" id="donate-food" name="donation[]" value="Food" /><span class="checkbox__custom"></span></label>

            <label class="checkbox__label" for="donate-others">&nbsp Others<input type="checkbox" id="donate-others" name="donation[]" value="Others" /><span class="checkbox__custom"></span></label>
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
            <label class="checkbox__label" for="project-individual">&nbsp Individual<input type="checkbox" id="project-individual" name="project[]" value="Individual" /><span class="checkbox__custom"></span></label>

            <label class="checkbox__label" for="project-group">&nbsp Group<input type="checkbox" id="project-group" name="project[]" value="Group" /><span class="checkbox__custom"></span></label>

            <label class="checkbox__label" for="project-short">&nbsp Short<input type="checkbox" id="project-short" name="project[]" value="Short" /><span class="checkbox__custom"></span></label>

            <label class="checkbox__label" for="project-long">&nbsp Long
              <input type="checkbox" id="project-long" name="project[]" value="Long" /><span class="checkbox__custom"></span></label>
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
      document.querySelector('body').style.overflowY = 'hidden';
    });

    document.getElementById('close').addEventListener('click', function() {
      document.querySelector('.modal-background.new').style.display = 'none';
      document.querySelector('body').style.overflowY = 'scroll';
    });


    $('div.burger').on('click', function() {
      $('.filters').toggleClass('clicked');
      $(this).toggleClass('clicked');
    });
  </script>
  <!-- Heads swiper function -->
  <script>
    const breakpoint = window.matchMedia('(min-width:31.25em)');
    let mySwiper;
    const breakpointChecker = function() {
      // if larger viewport and multi-row layout needed
      if (breakpoint.matches === true) {
        // clean up old instances and inline styles when available
        if (mySwiper !== undefined) mySwiper.destroy(true, true);
        // or/and do nothing
        return primarySwiper();
        // else if a small viewport and single column layout needed
      } else if (breakpoint.matches === false) {
        // fire small viewport version of swiper
        return enableSwiper();
      }
    };
    const enableSwiper = function() {
      mySwiper = new Swiper('.swiper-container', {
        loop: true,
        slidesPerView: 'auto',
        centeredSlides: true,
        // a11y: true,
        slidesPerColumn: 1,

        keyboardControl: true,
        grabCursor: true,
        // pagination
        pagination: '.swiper-pagination',
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        paginationClickable: true,
        autoplay: true,
      });
    };

    const primarySwiper = function() {
      var swiper = new Swiper('.swiper-container', {
        // Default parameters
        slidesPerView: 3,
        slidesPerColumn: 2,
        spaceBetween: 40,
        // Responsive breakpoints
        breakpoints: {
          // when window width is <= 320px
          320: {
            slidesPerView: 1,
            spaceBetween: 10,
            slidesPerColumn: 1,
          },
          // when window width is <= 480px
          480: {
            slidesPerView: 2,
            slidesPerColumn: 3,
            spaceBetween: 10,
          },

          // when window width is <= 768px
          768: {
            slidesPerView: 3,
            slidesPerColumn: 2,
            spaceBetween: 30,
          },
        },
      });
    };
    // keep an eye on viewport size changes
    breakpoint.addListener(breakpointChecker);
    // kickstart
    breakpointChecker();
  </script>
</body>

</html>