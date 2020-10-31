<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/style.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Wish Comes True | Wish </title>
</head>

<header>
  <img src="./images/logo.png" alt="Logo" />
  <h1>Wish Comes True HK</h1>
</header>

<body>
  <h2>&nbsp Confirm Wish Details</h2>

  <table style="width:40%" left-margin=40px>
    <tr>
      <td>
        <h3>&nbsp Organization</h3>
      </td>
    </tr>
    <tr>
      <td>&nbsp Organization Name:</td>
      <td><?php echo $_GET["name"]; ?></td>
    </tr>
    <tr>
      <td>&nbsp Phone Number:</td>
      <td><?php echo $_GET["phone"]; ?></td>
    </tr>
    <tr>
      <td>&nbsp Email Address:</td>
      <td><?php echo $_GET["email"]; ?></td>
    </tr>

    <td>
      <tr><br>
        <h3>The Wish</h3>
      </tr>
    </td>
    <tr>
      <td>&nbsp Wish Name:</td>
      <td><?php echo $_GET["wish"]; ?></td>
    </tr>
    <tr>
      <td>&nbsp District of event:</td>
      <td><?php echo $_GET["district"]; ?></td>
    </tr>
    <tr>
      <td>&nbsp Event Time:</td>
      <td><?php echo $_GET["starttime"]; ?></td>
    </tr>

    <td>
      <tr>
        <p2><br />&nbsp Minority Groups:</p2>
      </tr>
      <tr>
        <?php
        if (isset($_GET['minority'])) {?>
        <ul>
          <?php
              foreach ($_GET['minority'] as $selected_food) {
                ?>
          <li>
            <?php echo $selected_food."<br/>" ?>
          </li>
          <?php
              }
            ?>
        </ul>
        <?php
        } else {
            echo "No minority groups were selected. <br/>";
        }
        ?>
      </tr>
    </td>
    <td>
      <tr>
        <p2><br />&nbsp Donating Type:</p2>
      </tr>
      <tr>
        <?php
        if (isset($_GET['donate'])) {?>
        <ul>
          <?php
              foreach ($_GET['donate'] as $selected_food) {
                ?>
          <li><?php echo $selected_food."<br/>" ?></li>
          <?php
              }
            ?>
        </ul>
        <?php
        } else {
            echo "No donation types were selected. <br/>";
        }
        ?>
      </tr>
    </td>

    <td>
      <tr>
        <p2><br />&nbsp Project Types:</p2>
      </tr>
      <tr>
        <?php
        if (isset($_GET['project'])) {?>
        <ul>
          <?php
              foreach ($_GET['project'] as $selected_food) {
                ?>
          <li><?php echo $selected_food."<br/>" ?></li>
          <?php
              }
            ?>
        </ul>
        <?php
        } else {
            echo "No project types were selected. <br/>";
        }
        ?>
      </tr>
    </td>

    <td>
      <tr><br />&nbsp Start Date:</tr>
      <tr><?php echo $_GET["start"]; ?></tr>
    </td>
    <td>
      <tr><br />&nbsp End Date:</tr>
      <tr><?php echo $_GET["end"]; ?></tr>
    </td>
    <td>
      <tr><br />&nbsp Additional Information:</tr>
      <tr><?php echo $_GET["comment"]; ?></tr>
    </td>
  </table>

  <?php
    if (isset($_POST['confirm-wish'])) {
        addStuff();
        echo "Your wish will be processed by us in the coming few days.";
    }
    
    function addStuff()
    {
        $wish = "'".$_GET['wish']."'";
        $name = "'".$_GET['name']."'";
        $email = "'".$_GET['email']."'";
        $phone = "null";
        if (isset($_GET['phone']) && $_GET['phone']!= "") {
            $phone = "'".$_GET['phone']."'";
        } 
        $people = "'".$_GET['people']."'";
        $people = "'0'";
        if (isset($_GET['people']) && $_GET['people']!= "") {
            $people = "'".$_GET['people']."'";
        } 
        $money = "'0'";
        if (isset($_GET['money']) && $_GET['money']!= "") {
            $money = "'".$_GET['money']."'";
        } 
        $district = "null";
        if (isset($_GET['district']) && $_GET['district']!= "") {
            $district = "'".$_GET['district']."'";
        } 
        // $today = date("d.m.y");
        $starttime = "null";
        if (isset($_GET['starttime']) && $_GET['starttime']!= "") {
            $starttime = "'".$_GET['starttime']."'";
        } 
        $start = "null";
        if (isset($_GET['start']) && $_GET['start']!= "") {
            $start = "'".$_GET['start']."'";
        } 
        $end = "null";
        if (isset($_GET['end']) && $_GET['end']!= "") {
            $end = "'".$_GET['end']."'";
        } 
        $groups = "'"."'";
        $donating = "'"."'";
        $projects = "'"."'";
        if (isset($_GET['minority'])) {
            foreach ($_GET['minority'] as $selected_food) {
                $tempGroups = "";
                $tempGroups .= $selected_food . " | ";
            }
            $groups = "'".$tempGroups."'";
        } 
        if (isset($_GET['donation'])) {
            foreach ($_GET['donation'] as $selected_food) {
                $tempDonating = "";
                $tempDonating .= $selected_food . " | ";
            }
            $donating = "'".$tempDonating."'";

        } 
        if (isset($_GET['project'])) {
            foreach ($_GET['project'] as $selected_food) {
                $tempProjects = "";
                $tempProjects .= $selected_food . " | ";
            }
            $projects = "'".$tempProjects."'";
        } 

        $info = "null";
        if (isset($_GET['comment']) && $_GET['comment']!= "") {
            $info = "'".$_GET['comment']."'";
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

        $sql = "INSERT INTO `tbl_wishes` (`Wish_name`, `Organization_name`, `Email`, `Phone`, `Minority_groups`, `Donating_type`, `Project_type`, `People`, `Money`, `District`, `Event_time`, `Start_date`, `End_date`, `Additional_Information`) VALUES (".$wish.", ".$name.", ".$email.", ".$phone.", ".$groups.", ".$donating.", ".$projects.", ".$people.", ".$money.", ".$district.", ".$starttime.", ".$start.", ".$end.", ".$info.")";
        
        //here we need to add to db
        if (mysqli_query($conn, $sql)) {
            echo "New records created successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    ?>


  <form method="post">
    <button onclick="" id="submit-form" style="display: block;" type="submit" name="confirm-wish" class="button"
      value="Confirm Wish">Confirm
      Wish</button>
  </form>
  <a href="https://wishcomestruehk.000webhostapp.com">
    Go home
  </a>


</body>

</html>