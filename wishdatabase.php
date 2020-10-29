<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Database Creation</title>
</head>
<button onclick="addstuff()">
<button onclick="createtable()">
<script>
function createtable(){
  document.innerHTML = "
  <?php
  $servername = "localhost";
  $username = "id15251966_requested_wishes";
  $password = "/+S4S%1K^MId\dGb";
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
  // Create database


  $sql = "CREATE TABLE $table" (
    Name varchar(50) UNSIGNED PRIMARY KEY,
    Phone int(8),
    Email varchar (50),
    Minority groups varchar(25),
    Project type varchar(25),
    Start date varchar(25),
    End date varchar(25),
    Additional information varchar(50),
    )
    if ($conn->query($sql) === TRUE) {
  echo "Table tbl_wishes created successfully";
    else {
  echo "Error creating table: " . $conn->error;
  mysqli_close($conn);
  ?>
  ";
}

function addstuff(){
  document.innerHTML = "
  <?php
  $servername = "localhost";
  $username = "id15251966_requested_wishes";
  $password = "/+S4S%1K^MId\dGb";
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



  ?>
  ";
}
</script>


</html>
