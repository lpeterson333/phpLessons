<?php
$con = mysqli_connect("localhost","vurgerbarn", "vurgerbarn");
if (!$con){
  echo "<h2>Sorry, we could not process your request at this time.</h2>\n";
  echo "<a href=\"index.php?content=register\">Try again</a>\n";
  echo "<a href=\"index.php\">Return to Home</a>\n";
  exit;
}

mysqli_select_db($con, "recipe") or die("Could not connect to database");
$userid = $_POST['userid'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$baduser = 0;
//check if userid was entered
if (trim($userid) == ''){
  echo "<h2>Sorry you must enter a user name.</h2><br>\n";
  echo "<a href=\"index.php?content=register\">Try again</a>\n";
  echo "<a href=\"index.php\">Return to Home</a>\n";
  $baduser = 1;
}
//check if password was entered
if(trim($password)==''){
  echo "<h2>Sorry you must enter a password.</h2><br>\n";
  echo "<a href=\"index.php?content=register\">Try again</a>\n";
  echo "<a href=\"index.php\">Return to Home</a>\n";
  $baduser = 1;
}
//check if password and confirm password match
if ($password != $password2){
  echo "<h2>Sorry passwords you entered did not match.</h2><br>\n";
  echo "<a href=\"index.php?content=register\">Try again</a>\n";
  echo "<a href=\"index.php\">Return to Home</a>\n";
  $baduser = 1;
}
//check if userid is already in database
$query = "SELECT userid from users where userid = '$userid'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
if ($row['userid'] == $userid){
  echo "<h2>Sorry that user name is already taken.</h2><br>\n";
  echo "<a href=\"index.php?content=register\">Try again</a>\n";
  echo "<a href=\"index.php\">Return to Home</a>\n";
  $baduser = 1;
}

if ($baduser != 1){
  $query = "INSERT into users VALUES ('$userid', PASSWORD('$password'), '$fullname', '$email')";
  $result = mysqli_query($con, $query) or die("Sorry, we were unable to process your request.");
  if ($result){
    $_SESSION['valid_recipe_user'] = $userid;
    echo "<h2>Your registration request has been approved and you are now logged in.</h2>\n";
    echo "<a href=\"index.php\">Return to Home</a>\n";
    exit;
  }else{
    echo "<h2>Sorry there was a problem processing your login request.</h2><br>\n";
    echo "<a href=\"index.php?content=register\">Try again</a>\n";
    echo "<a href=\"index.php\">Return to Home</a>\n";
  }


}
?>