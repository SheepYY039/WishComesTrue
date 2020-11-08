<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/style.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Wish Comes True | Wish </title>

  <link rel="icon" type="image/png" href="./favicon.png" />
  <link rel="shortcut icon" href="./favicon.png" type="image/x-icon" />

</head>

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
        </ul>
      </div>
      <?php } ?>
    </div>
  </div>
</header>

<body>
  <section class="body">
    <div class="modal-background-new">
      <div class="modal_new modal">
        <div class="modal-content">
          <h2>&nbsp; Confirm Wish Details</h2>
          <form id="formal" name="formal" action="">
            <h3>&nbsp; Organization</h3>

            <div class="form-input-material">
              <label for="name">&nbsp; Organization Name:</label>
              <input class="form-control-material" disabled readonly type="text" id="name" name="name"
                value="<?php echo $_GET["name"]; ?>" />

            </div>
            <div class="form-input-material">
              <label for="phone">&nbsp; Phone Number:</label>

              <input class="form-control-material" disabled readonly type="tel" id="phone" name="phone"
                value="<?php echo $_GET["phone"]; ?>" />
            </div>

            <div class="form-input-material">
              <label for="email">&nbsp; Email Address:</label>
              <input class="form-control-material" disabled readonly required type="email" id="email" name="email"
                value="<?php echo $_GET["email"]; ?>" />
            </div>

            <h3>&nbsp; The Wish</h3>
            <div class="form-input-material">
              <label for="phone">&nbsp; Name of Wish</label>
              <input class="form-control-material" disabled readonly type="wish" id="wish" name="wish"
                value="<?php echo $_GET["wish"]; ?>" />
            </div>

            <div class="form-input-material">
              <label for="district">&nbsp; District of event: &nbsp (if applicable)</label>

              <input class="form-input-material" disabled readonly type="district" id="district" name="district"
                value="<?php echo $_GET["district"]; ?>" />
            </div>

            <div class="form-input-material">
              <label for="starttime">&nbsp Event time: &nbsp (if applicable)</label>

              <input class="form-input-material" disabled readonly type="time" id="starttime" name="starttime"
                value="<?php echo $_GET["starttime"]; ?>" />
            </div>

            <h4>&nbsp Minority Groups</h4>
            <div class="container check__group">
              <?php
              if (isset($_GET['minority'])) { ?>
              <?php
                foreach ($_GET['minority'] as $selected_minority) {
                ?>
              <label class="checkbox__label" for="minority-<?php echo $selected_minority ?>">&nbsp
                <?php echo $selected_minority ?><input type="checkbox" disabled checked
                  id="minority-<?php echo $selected_minority ?>" disabled readonly name="minority[]"
                  value="<?php echo $selected_minority ?>" /><span class="checkbox__custom"></span></label>
              <?php
                } ?>
              <?php } else {
              ?>
              <label class="checkbox__label" for="minority-no">&nbsp
                There are no selected Minority Groups<input type="checkbox" id="minority-no" checked disabled readonly
                  name="minority[]" value="" /><span class="checkbox__custom"></span></label>
              <?php
              } ?>

            </div>
            <h4>&nbsp Donating Type</h4>
            <div class="container check__group">
              <?php
              if (isset($_GET['donation'])) { ?>
              <?php
                foreach ($_GET['donation'] as $selected_donate) {
                ?>
              <label class="checkbox__label" for="donate-<?php echo $selected_donate ?>">&nbsp
                <?php echo $selected_donate ?><input type="checkbox" id="donate-<?php echo $selected_donate ?>" checked
                  disabled readonly name="donate[]" value="<?php echo $selected_donate ?>" /><span
                  class="checkbox__custom"></span></label>
              <?php
                } ?>
              <?php } else {
              ?>
              <label class="checkbox__label" for="donate-no">&nbsp
                There are no selected Donating Types<input type="checkbox" id="donate-no" checked disabled readonly
                  name="donate[]" value="There are no selected Donating Types" /><span
                  class="checkbox__custom"></span></label>
              <?php
              } ?>
            </div>

            <div class="form-input-material">
              <label for="money">&nbsp Donation required(HK$): &nbsp (if applicable)</label>

              <input class="form-input-material" readonly checked disabled type="money" id="money" name="money"
                value="<?php echo $_GET["people"]; ?>" />
            </div>

            <div class="form-input-material">
              <label for="people">&nbsp; Amount of people required: &nbsp (if applicable)</label>

              <input class="form-input-material" readonly checked disabled type="people" id="people" name="people"
                value="<?php echo $_GET["money"]; ?>" />
            </div>

            <h4>&nbsp; Project Type</h4>
            <div class="container check__group">
              <?php
              if (isset($_GET['project'])) { ?>
              <?php
                foreach ($_GET['project'] as $selected_project) {
                ?>
              <label class="checkbox__label" for="project-<?php echo $selected_project ?>">&nbsp;
                <?php echo $selected_project ?>
                <input checked disabled type="checkbox" id="project-<?php echo $selected_project ?>" disabled readonly
                  name="project[]" value="<?php echo $selected_project ?>" /><span
                  class="checkbox__custom"></span></label>
              <?php
                } ?>
              <?php } else {
              ?>
              <label class="checkbox__label" for="project-no">&nbsp;
                There are no selected Project Types<input type="checkbox" id="project-no" checked disabled readonly
                  name="project[]" value="" /><span class="checkbox__custom"></span></label>
              <?php
              } ?>
            </div>
            <div class="container">
              <label class="date__label" for="start">
                <h4>&nbsp; Start Date:&nbsp;(if applicable)</h4>
              </label>
              <input type="date" id="start" name="start" disabled readonly value="<?php echo $_GET["start"]; ?>" />
            </div>

            <div class="container">
              <label class="date__label" for="end">
                <h4>&nbsp; End Date: &nbsp; (if applicable)</h4>
              </label>
              <input type="date" id="end" name="end" disabled readonly value="<?php echo $_GET["end"]; ?>" />
            </div>

            <div class="container__box">
              <h4>&nbsp; Additional Information:</h4>
              <textarea name="comment" disabled readonly><?php echo $_GET["comment"]; ?></textarea>
            </div>
          </form>
          <?php
          if (isset($_POST['confirm-wish'])) {
            addStuff();

            echo "Your wish will be processed by us in the coming few days.";
          }

          function addStuff()
          {
            $wish = "'" . $_GET['wish'] . "'";
            $name = "'" . $_GET['name'] . "'";
            $email = "'" . $_GET['email'] . "'";
            $phone = "null";
            if (isset($_GET['phone']) && $_GET['phone'] != "") {
              $phone = "'" . $_GET['phone'] . "'";
            }
            $people = "'" . $_GET['people'] . "'";
            $people = "'0'";
            if (isset($_GET['people']) && $_GET['people'] != "") {
              $people = "'" . $_GET['people'] . "'";
            }
            $money = "'0'";
            if (isset($_GET['money']) && $_GET['money'] != "") {
              $money = "'" . $_GET['money'] . "'";
            }
            $district = "null";
            if (isset($_GET['district']) && $_GET['district'] != "") {
              $district = "'" . $_GET['district'] . "'";
            }
            $starttime = "null";
            if (isset($_GET['starttime']) && $_GET['starttime'] != "") {
              $starttime = "'" . $_GET['starttime'] . "'";
            }
            $start = "null";
            if (isset($_GET['start']) && $_GET['start'] != "") {
              $start = "'" . $_GET['start'] . "'";
            }
            $end = "null";
            if (isset($_GET['end']) && $_GET['end'] != "") {
              $end = "'" . $_GET['end'] . "'";
            }
            $groups = "'" . "'";
            $donating = "'" . "'";
            $projects = "'" . "'";
            if (isset($_GET['minority'])) {
              $tempGroups = "";
              foreach ($_GET['minority'] as $selected_minority) {
                $tempGroups .= $selected_minority . " | ";
              }
              $groups = "'" . $tempGroups . "'";
            }
            if (isset($_GET['donation'])) {
              $tempDonating = "";
              foreach ($_GET['donation'] as $selected_donate) {
                $tempDonating .= $selected_donate . " | ";
              }
              $donating = "'" . $tempDonating . "'";
            }
            if (isset($_GET['project'])) {
              $tempProjects = "";
              foreach ($_GET['project'] as $selected_project) {
                $tempProjects .= $selected_project . " | ";
              }
              $projects = "'" . $tempProjects . "'";
            }

            $info = "null";
            if (isset($_GET['comment']) && $_GET['comment'] != "") {
              $info = "'" . $_GET['comment'] . "'";
            }

            $servername = "localhost";
            $username = "id15251966_requested_wishes";
            $password = "WCThk2020-WCThk2020";
            $dbname = "id15251966_wishes";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            echo "Connected successfully<br/>";

            $sql = "INSERT INTO `tbl_wishes` (`Wish_name`, `Organization_name`, `Email`, `Phone`, `Minority_groups`, `Donating_type`, `Project_type`, `People`, `Money`, `District`, `Event_time`, `Start_date`, `End_date`, `Additional_Information`) VALUES (" . $wish . ", " . $name . ", " . $email . ", " . $phone . ", " . $groups . ", " . $donating . ", " . $projects . ", " . $people . ", " . $money . ", " . $district . ", " . $starttime . ", " . $start . ", " . $end . ", " . $info . ")";

            //here we need to add to db
            if (mysqli_query($conn, $sql)) {
              echo "New records created successfully<br>";
            } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
          }


          ?>

          <div class="button_cont" align="center">
            <form id="submit-btn" method="post">
              <button id="submit-form" type="submit" name="confirm-wish" class="button btn btn__ani"
                value="Confirm Wish">Confirm Wish</button>
            </form>
          </div>
          <button id="myButton" class="float-left btn btn__ani submit-button">Go Home</button>
        </div>
      </div>
    </div>

  </section>
  <script type="text/javascript">
  $(document).ready(function() {
    document.getElementById("submit-btn").onclick = function() {

      document.getElementById("formal").style.display = 'none';
      document.getElementById("submit-btn").style.display = 'none';
    }
    // document.getElementById("myButton").style.display = 'block';
    document.getElementById("myButton").onclick = function() {
      location.href = "https://wishcomestruehk.000webhostapp.com";
    }
  });

  ;
  </script>

</body>

</html>