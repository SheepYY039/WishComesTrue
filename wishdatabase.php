<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Database Creation</title>
</head>
<button onclick="addstuff()">

<script>

function addstuff(){
  document.innerHTML = "
  <?php
  $servername = "localhost";
  $username = "id15251966_requested_wishes";
  $password = "WCThk2020-WCThk2020";
  $dbname = "id15251966_wishes";
  $table = "tbl_wishes";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";

  //here we need to add to db
  $sql = "INSERT INTO $table
  	VALUES ($_GET['wish'], $_GET['name'],$_GET['email'],$_GET['phone'],$groups,$projects,$_GET['people'],$_GET['money'],$_GET['District'],$inputdate,$_GET['starttime'],$_GET['start'],$_GET['end'],$_GET['info'])";
    if (mysqli_query($conn, $sql)) {
        echo "New records created successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

  ?>
  ";
}
</script>


</html>
