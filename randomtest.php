<html>
<body>
<h1>Random number test</h1>
<?php 
$var = rand(0,100);
if ($var > 50){
  echo "<h2>The value is big: $var</h2>";
}elseif ($var  > 25){
  echo "<h2>The value is medium: $var</h2>";
}else{
  echo "<h2>The value is small: $var </h2>";
}







?>
</body>
</html>