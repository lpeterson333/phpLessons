<?php 
$con = mysqli_connect("localhost","vurgerbarn","vurgerbarn") or die("Sorry, could not connect to server");

mysqli_select_db($con,"recipe") or die('Sorry, could not connect to database');

$search = $_GET['searchFor'];
$words = explode(" ", $search);
$phrase = implode("%' OR title LIKE '%", $words);
$query = "SELECT recipeid,title,shortdesc from recipes where title like '%$phrase%'";

$result = mysqli_query($con, $query) or die('Sorry, could not query database at this time');

echo "<h1>Search Results</h1>\n";

if (mysqli_num_rows($result) == 0){

  echo "<h2>Sorry, no results with '$search' in them.</h2>\n";
}else{
  while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
    $recipeid = $row['recipeid'];
    $title = $row['title'];
    $shortdesc = $row['shortdesc'];
    echo "<a href=\"index.php?content=showrecipe&id=$recipeid\">$title</a><br>\n";
    echo "$shortdesc<br><br>\n";
  }
}



?>