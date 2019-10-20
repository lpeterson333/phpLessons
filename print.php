<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="print.css" />
<title>The Vegan Recipe Center</title>
</head>
<body>
<?php
// <!-- connect to server -->
$con = mysqli_connect("localhost","vurgerbarn","vurgerbarn") or die('Sorry, could not connect to server');
// <!--select database on server -->
mysqli_select_db($con,"recipe") or die('Sorry, could not connect to database');

// <!--get recipeid from user input or page user is on -->
$recipeid = $_GET['id'];

// <!--create query for table in database -->
$query = "SELECT title, poster, shortdesc, ingredients, directions FROM recipes WHERE recipeid = $recipeid";

// <!--query the table for the data-->

$result = mysqli_query($con, $query) or die('Could not find recipe.');

// <!--hmmm...not sure what difference is between result and row-->
$row = mysqli_fetch_array($result, MYSQLI_ASSOC) or die('No records retrieved');

// <!--assign results content to variables -->
$title = $row['title'];
$poster = $row['poster'];
$shortdesc = $row['shortdesc'];
$ingredients = $row['ingredients'];
$directions = $row['directions'];

// <!-- nl2br — Inserts HTML line breaks before all newlines in a string -->
$ingredients = nl2br($ingredients);
$directions = nl2br($directions);

// <!--output into html -->
echo "<h2>$title</h2>\n";
echo "posted by $poster<br>\n";
echo $shortdesc . "\n";
echo "<h3>Ingredients</h3>\n";
echo $ingredients . "<br>\n";
echo "<h3>Directions:</h3>\n";
echo $directions . "\n";


?>
</body>
</html>