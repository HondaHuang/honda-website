<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="index.css" media="screen">
	<link rel="stylesheet" type="text/css" href="print.css" media="print">
	<link rel='shortcut icon' href='images/favicon.ico' type='image/x-icon'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<title>Homeworkuse</title>
	<meta name="Honda's website" content="Website used for the CIS3630 class." />
</head>
<body>
<div id="wrapper">
<header><h1>Honda Huang</h1></header>
<nav class="hidden-print">
    <ul class="topnav">
    <li><a href="index.html">Home</a></li>
    <li><a href="gallery.html">Gallery</a></li>
    <li><a href="video.html">Promotional Videos</a></li>
    <li><a href="other.html">Other</a></li>
    <li><a href="aboutme.html">About Me</a></li>
    <li><a href="site-map.html">Site Map</a></li>
    <li><a href="add-email.php">Add Email</a></li>
    <li><a class="active" href="emails.php">Email</a></li>
    <li><a href="http://cis3630.org/student-webpages.php" target="_blank">Student Pages</a></li>
    <li><a href="http://dewittdevs.com/" target="_blank">Dewitt John</a></li>
    </ul>
</nav>
<main>

<?php
  include('database-connect.php');
// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id,name,email,url,added FROM students";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
echo '<ol>' ;
while($row = $result->fetch_assoc()) {
echo '<li><a href="'.$row["url"].'">'.$row["name"].'</a></li>';

}
echo '</ol>' ;
} else {
echo "0 results";
}
$conn->close();
?>
<hr />
<p><a href="add-email.php">Add a New Email</a></p>
</main>
<footer>
Copyright © 2017 Honda Huang <br>
<a href="https://validator.w3.org/nu/?useragent=Validator.nu%2FLV+http%3A%2F%2Fvalidator.w3.org%2Fservices&doc=http%3A%2F%2Fwww.homeworkuse.com%2Fother.html">Validator</a>
</footer>
</div>
</body>
</html>