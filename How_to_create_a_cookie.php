A common question after Lesson 10 is to explain the difference between the session cookies we used in this lesson and a "normal" cookie we hear so much about. Let me try to elaborate more on what a "normal cookie" is, and how to use them in PHP:

Session cookies (or session variables) are kept on the server, and related to the client's connection using a session ID. When the client closes the browser window, the session ID is lost, so the session cookies are lost.

Normal cookies are variables and values that are kept in a file on a visitor's PC that persist between Web sessions. While a session cookie expires as soon as the visitor closes the browser, a normal cookie stays for as long as you tell it to (unless of course the visitor clears the cookie cache).

You set a normal cookie using the PHP setcookie() function. Just like the session_start() function, it MUST appear before the <html> tag in a Web page. The format of the function is:

setcookie("name", "value", expiration, path, domain)

You can leave off the path and domain part, PHP will provide that for you. The name and value part define the variable name, and the data value assigned to it. The expiration time is how long you want to cookie to remain valid. This is a specific time value, not an incremental value. Most places use the time() function to return the current time, then add the number of seconds the cookie should stay valid.

Here's an example of setting and reading a cookie. First, create a file called cookie1.php containing this code:

<?php
setcookie("mytest", "please remember me", time()+3600);
?>
<html>
<title>Cookie Page 1</title>
<body>
The cookie has been set!
</body>
</html>

This code sets a cookie with the name 'mytest', and makes it valid for one hour (3600 seconds from the current time).
Open your browser, and visit your new Web site: http://localhost/cookie1.php. This will create the cookie in your browser's temp file cache.

Now, create another Web page file called cookie2.php, and enter the following code:

<html>
<title>Cookie Page 2</title>
<body>
Let's try and read the cookie:<br>
<?php
$test = $_COOKIE['mytest'];
echo "The cookie value is: " . $test . "\n";
?>
</body>
</html>

Make sure you closed your previous browser session, start a new browser session, and view this page in your browser. You should see the text from your cookie in your Web page! If you try that an hour later, the cookie will have expired, and you won't see the data.

Now you know how to store data for long periods of time on your visitors' PCs! Now just be careful with your new found power!