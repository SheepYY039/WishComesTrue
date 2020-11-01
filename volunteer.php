<?php
$servername = "localhost";
$username = "id15251966_requested_wishes";
$password = "WCThk2020-WCThk2020";
$dbname = "id15251966_wishes";

// Create connection
$conn =  mysqli_connect($servername, $username, $password, $dbname);

// CHECK DATABASE CONNECTION
if (mysqli_connect_errno()) {
  echo "Connection Failed" . mysqli_connect_error();
  exit;
}
$sql = "SELECT `Wish_id`,`Wish_name`,`Project_type`,`Minority_groups`,`Donating_type`,`Organization_name`,`District`, `Start_date`, `End_date` FROM `tbl_wishes` WHERE `isApproved` = 1";
$result = mysqli_query($conn, $sql);

?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style type="text/css">
  .field {
    display: flex;
    margin: auto;
    padding: 3%;
    border-bottom: black solid;
    border-bottom-width: thin;
  }

  .field h4 {
    margin: 0 auto;
    max-width: 40%;
    height: 100%;
  }

  .field h5 {
    margin: auto;
  }
  </style>
  <title>Wishes Come True | Volunteer</title>
</head>

<body>
  <div class="wishes">
    <?php
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="wish">
      <div class="wish__contents">
        <h3 class="wish__name"><?php echo $row["Wish_name"] ?></h3>
        <p class="wish__filters"><?php echo $row["Minority_groups"].$row["Project_type"].$row["Donating_type"] ?></p>
      </div>
      <button id="<?php echo $row["Wish_id"] ?>" class="wish__more-info details_button">More Info</button>
      <div id="background-<?php echo $row["Wish_id"] ?>" class="modal-background">
        <div class="modal">
          <div class="modal-header">
            <div class="modal-cancel close-<?php echo $row["Wish_id"] ?>" id="close"></div>
            <h2>More info - <?php echo $row["Wish_name"] ?></h2>
          </div>
          <div class="modal-content">
            <div class="field">
              <h4>Organization Name</h4>
              <h5><?php echo $row["Organization_name"] ?></h5>
            </div>
            <div class="field">
              <h4>District</h4>
              <h5><?php echo $row["District"] ?></h5>
            </div>
            <div class="field">
              <h4>Start date</h4>
              <h5><?php echo $row["Start_date"] ?></h5>
            </div>
            <div class="field">
              <h4>End date</h4>
              <h5><?php echo $row["End_date"] ?></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php 
      }
    }
    ?>
  </div>

  <script type="text/javascript">
  var addButtons = document.getElementsByClassName('details_button');

  function getDetails() {
    var id = event.srcElement.id;
    var select = "background-" + id;
    var cross = "close-" + id;
    var modalBackground = document.getElementById(select);
    modalBackground.style.display = 'flex';
    modalBackground.style.left = 0;
    // TODO only works for the first modal
    var crossTemp = document.getElementsByClassName(cross)[0];
    crossTemp.addEventListener('click', function() {
      modalBackground.style.display = 'none';
    });
  };

  for (i = 0; i < addButtons.length; i++) {
    addButtons[i].addEventListener("click", getDetails);
  }
  </script>

</body>

</html>

<?php
mysqli_close($conn);
?>