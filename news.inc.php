<h3>Vegan Foodie News</h3>

<br>The latest vegan food news<br>

<?php

$con = mysqli_connect("localhost", "vurgerbarn", "vurgerbarn") or die('Could not connect to server');

mysqli_select_db($con,"recipe") or die('Sorry, could not connect to the database');

$query = "SELECT title,date,article from news order by date desc limit 0,2";

$result = mysqli_query($con,$query) or die('Sorry, could not get news articles');

while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))

{

    $date = $row['date'];

    $title = $row['title'];

    $article = $row['article'];

    echo "<br>$date - <b>$title</b><br>$article<br><br>";

}

?>

 