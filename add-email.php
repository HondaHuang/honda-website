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
    <li><a class="active" href="add-email.php">Add Email</a></li>
    <li><a href="emails.php">Email</a></li>
    <li><a href="http://cis3630.org/student-webpages.php" target="_blank">Student Pages</a></li>
    <li><a href="http://dewittdevs.com/" target="_blank">Dewitt John</a></li>
    </ul>
</nav>
<main>

<?php
include('database-connect.php');

if(isset($_POST['add']))
{

$conn = mysql_connect($servername, $username, $password, $dbname );
if(! $conn )
{
die('Could not connect: ' . mysql_error());
}

if(! get_magic_quotes_gpc() )
{
$student_name = addslashes ($_POST['student_name']);
$student_email_address = addslashes ($_POST['student_email_address']);
}
else
{
$student_name = $_POST['student_name'];
$student_email_address = $_POST['student_email_address'];
}
$student_website = $_POST['student_website'];

$sql = "INSERT INTO students". "(name,email, url, added) ". "VALUES('$student_name','$student_email_address','$student_website', NOW())";
mysql_select_db($dbname);
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
die('Could not enter data: ' . mysql_error());
}
echo '<a href="emails.php">Info Entered Successfully</a>!';
mysql_close($conn);
}
else
{
?>
<form method="post" action="add-email.php">
<table style="width:300px;padding:10px">
<tr>
<td style="width:100px">Name</td>
<td><input name="student_name" type="text" id="student_name" /></td>
</tr>
<tr>
<td style="width:100px">Email Address</td>
<td><input name="student_email_address" type="text" id="student_email_address" /></td>
</tr>
<tr>
<td style="width:100px">Website</td>
<td><input name="student_website" type="text" id="student_website" /></td>
</tr>
<tr>
<td style="width:100px"></td>
<td> </td>
</tr>
<tr>
<td style="width:100px"></td>
<td>
<input name="add" type="submit" id="add" value="Add Email" />
</td>
</tr>
</table>
</form>
<a href="emails.php">Email List</a>
<?php
}
?>
</main>
<footer>
Copyright © 2017 Honda Huang <br>
<a href="https://validator.w3.org/nu/?useragent=Validator.nu%2FLV+http%3A%2F%2Fvalidator.w3.org%2Fservices&doc=http%3A%2F%2Fwww.homeworkuse.com%2Fother.html">Validator</a>
</footer>
</div>
</body>
</html>