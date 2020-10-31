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
  <img src="./images/icon.png" alt="Logo" />
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
        <p2>&nbsp Minority Groups:</p2>
      </tr>
      <tr>
        <ul><?php
            $children = $_GET["minority-children"];
            $homeless = $_GET["minority-homeless"];
            $elderly = $_GET["minority-elderly"];
            $low_income = $_GET["minority-low-income"];
            $others = $_GET["minority-others"];
			$groups = "";
			$groups = $children + $homeless + $elderly + $low_income + $others;
            if ($children = "Children") {
              echo "<li>" + $group1;
            }
            if ($homeless = "Homeless") {
              echo "<li>" + $homeless;
            }
            if ($elderly = "Elderly") {
              echo "<li>" + $elderly;
            }
            if ($low_income = "Low Income") {
              echo "<li>" + $low_income;
            }
            if ($others = "Others") {
              echo "<li>" + $others;
            }
            ?></ul>
      </tr>
    </td>
    <td>
      <tr>
        <p2>&nbsp Donating Type:</p2>
      </tr>
      <tr>
        <ul><?php
            $funding = $_GET["donate-funding"];
            $second_hand = $_GET["donate-second-hand"];
            $food = $_GET["donate-food"];
            $donate_others = $_GET["donate-others"];
			$donating = "";
			$donating = $funding + $second_hand + $food + $donate_others;
			
            if ($funding = "Funding") {
              echo "<li>" + $funding;
            }
            if ($second_hand = "Second Hand") {
              echo "<li>" + $second_hand;
            }
            if ($food = "Food") {
              echo "<li>" + $food;
            }
            if ($donate_others = "Others") {
              echo "<li>" + $donate_others;
            }
            ?></ul>
      </tr>
    </td>

    <td>
      <tr>
        <p2>&nbsp Project Types:</p2>
      </tr>
      <tr>
        <ul><?php
            $individual = $_GET["project-individual"];
            $group = $_GET["project-group"];
            $short = $_GET["project-short"];
            $long = $_GET["project-long"];
			$projects = "";
			$projects = $individual + $group + $short + $long;
			
            if ($individual = "Individual") {
              echo "<li>" + $individual;
            }
            if ($group = "Group") {
              echo "<li>" + $group;
            }
            if ($short = "Short") {
              echo "<li>" + $short;
            }
            if ($long = "Long") {
              echo "<li>" + $long;
            }
            ?></ul>
      </tr>
    </td>

    <td>
      <tr>&nbsp Start Date:</tr>
      <tr><?php echo $_GET["start"]; ?></tr>
    </td>
    <td>
      <tr>&nbsp End Date:</tr>
      <tr><?php echo $_GET["end"]; ?></tr>
    </td>
    <td>
      <tr>&nbsp Additional Information:</tr>
      <tr><?php echo $_GET["info"]; ?></tr>
    </td>
  </table>

  <button onclick="addstuff()" value="Confirm Wish">
    <script>
      function addstuff() {
        document.innerHTML = "
        <?php
        $wish = $_GET['wish'];
        $name = $_GET['name'];
        $email = $_GET['email'];
        $phone = $_GET['phone'];
        $people = $_GET['people'];
        $money = $_GET['money'];
        $district = $_GET['District'];
        $today = date("d.m.y");
        $starttime = $_GET['starttime'];
        $start = $_GET['start'];
        $end = $_GET['end'];


        $servername = "localhost";
        $username = "id15251966_requested_wishes";
        $password = "WCThk2020-WCThk2020";
        $dbname = "id15251966_wishes";
        $table = "tbl_wishes";
        $info = $_GET['info'];

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";

        //here we need to add to db
        $sql = "INSERT INTO tbl_wishes (Wish_name, Email, Phone, Minority_groups, Donating_type, Project_type, People, Money, District, Initiation_time, Event_time, Start_time, End_time, Additional_information) 
        VALUES ($wish,$name,$email,$phone,$groups,$donating,$projects,$people,$money,$district,$today,$starttime,$start,$end,$info)";
        if (mysqli_query($conn, $sql)) {
          echo "New records created successfully<br>";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        ?>
          ";
      }
    </script>

</body>

</html>