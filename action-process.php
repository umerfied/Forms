

    <?php
    include 'include/connection.php';
        if(($_SERVER['REQUEST_METHOD']?? "") === 'POST'){
        
        $email = htmlspecialchars($_POST['email']);

        $insertquery = "INSERT INTO emails(email) VALUES ('$email');";
        
        $result = pg_query($conn,$insertquery);

        // if($result){
        //     $printquery = "SELECT * FROM emails";
        //     $print = pg_query($conn,$printquery);
        //     echo $print;
        }
        else{
    
            echo "Failed". preg_last_error($conn);
        }   
    
    if (!$result) {
        die("Query failed: " . pg_last_error());
    }
    
    // Display data in an HTML table
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Email</th></tr>";
    
    while ($row = pg_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        //echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        //echo "<td>" . $row['age'] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
    
    pg_close($conn);     
        // Your email is <?php echo $_POST["email"]; ?>
