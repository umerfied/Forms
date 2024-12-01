
<?php
$username = 'your username';
$password = 'your password';
$dbname = 'yourdb';
$hostname = 'localhost';
$conn = pg_connect("host=$hostname dbname=$dbname user=$username password=$password");
if(!$conn){   
    die("Error". pg_last_error());      
}
?>