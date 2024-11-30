
<?php
$username = 'postgres';
$password = '123';
$dbname = 'email_db';
$hostname = 'localhost';
$conn = pg_connect("host=$hostname dbname=$dbname user=$username password=$password");
if(!$conn){
    echo "Succeed";    
    die("Error");    
}
?>