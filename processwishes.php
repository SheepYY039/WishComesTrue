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
	
	<tabel style="width:40%" left-margin=40px>
	<tr><td><h3>&nbsp Organization</h3></td></tr>
	<tr><td>&nbsp Organization Name:</td>
	<td><?php echo $_GET["name"];?></td></tr>
	<tr><td>&nbsp Phone Number:</td>
	<td><?php echo $_GET["phone"];?></td></tr>
	<tr><td>&nbsp Email Address:</td>
	<td><?php echo $_GET["email"];?></td></tr>
		
	<td><tr><br><h3>The Wish</h3></tr></td>
		
	<td><tr><p2>&nbsp Minority Groups:</p2></tr>
	<tr><ul>
		<li><?php echo $_GET["group1"];?></li>
		<li><?php echo $_GET["group2"];?></li>
		<li><?php echo $_GET["group3"];?></li>
		</ul>
		<?php 
		$group1 = $_GET["group1"];
		$group2 = $_GET["group2"];
		$group3 = $_GET["group3"];
		$groups = "";
		if ($group1 <> ""){
			$groups =$group1 + ", ";
		}
		if ($group2 <> ""){
			$groups = $groups + $group2 + ", ";
		}
		if ($group3 <> ""){
			$groups = $groups + $group3;
		}
		echo $groups
		?></tr></td>
		
		<td><tr><p2>&nbsp Project Types:</p2></tr>
		<tr><ul>
		<li><?php echo $_GET["project1"];?></li>
		<li><?php echo $_GET["project2"];?></li>
		<li><?php echo $_GET["project3"];?></li>
		</ul></tr></td>
		
		<td><tr>&nbsp Start Date:</tr>
		<tr><?php echo $_GET["start"];?></tr></td>
		<td><tr>&nbsp End Date:</tr>
		<tr><?php echo $_GET["end"];?></tr></td>
		<td><tr>&nbsp Additional Information:</tr>
		<tr><?php echo $_GET["info"];?></tr></td>
	</tabel>
	
	</body>
</html>
