

    <?php
    include 'include/connection.php';
        if(($_SERVER['REQUEST_METHOD']?? "") === 'POST'){
        
        $fname = htmlspecialchars($_POST['fname']);
        $lname = htmlspecialchars($_POST['lname']);
        $date_of_birth = date( 'Y-m-d', strtotime($_POST['date_of_birth']));

        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        

        $insertquery = "INSERT INTO forms(first_name, last_name, date_of_birth, email, pass) VALUES ($1, $2, $3, $4, $5)";
        $printquery = "SELECT * FROM forms";
        $insert_result = pg_query_params($conn,$insertquery,array($fname,$lname,$date_of_birth,$email,$password)); 
        $result = pg_query($conn,$printquery);
    if (!$result || !$insert_result) {
        die("Query failed: " . pg_last_error());
    }
    
    // Display data in an HTML table
    
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Date Of Birth</th><th>Email</th><th>Password<th></tr>";
    
    while ($row = pg_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $row['date_of_birth'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['pass'] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
    
    pg_close($conn);   }
  ?>