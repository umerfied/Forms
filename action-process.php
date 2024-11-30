

    <?php
    include 'include/connection.php';
        if(($_SERVER['REQUEST_METHOD']?? "") === 'POST'){
        
        $email = htmlspecialchars($_POST['email']);

        $insertquery = "INSERT INTO emails(email) VALUES ('$email');";
        
        $result = pg_query($conn,$insertquery);

        if($result){
            $printquery = "SELECT * FROM emails";
            $print = pg_query($conn,$printquery);
            echo $print;
        }
        else{
    
            echo "Failed". preg_last_error($conn);
        }   
    }    
        // Your email is <?php echo $_POST["email"]; ?>
