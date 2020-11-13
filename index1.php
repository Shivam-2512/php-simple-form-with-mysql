<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `travel`.`trip` (`Name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();

}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai&family=Lobster&display=swap" rel="stylesheet">
</head>
<body>
<img src="bg.jpg" class="bg" alt="City">
<div class="container">
    <h3>Welcome to Travel from of US trip </h3>
    <p>Enter your Details and Submit to confirm your participation  </p>
    
    <?php
    if($insert == true){
    echo "<p class='submitMsg'>Thanks for submitting and joining with us .</p>";
    }
    ?>
    <form action="index1.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name  :">
        <input type="number" name="age" id="age" placeholder="Enter your age  :">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender  :">
        <input type="email" name="email" id="gender" placeholder="Enter your email  :">
        <input type="phone" name="phone" id="phone" placeholder="Enter your phone no.   :">
        <textarea name="desc" id="desc" cols="10" rows="10" placeholder="Enter any other information here"></textarea>
        <span><button class="btn">Submit</button>
        <button class="btn">Reset</button></span>
    </form>
</div>
    <script src="index.js"></script>
    
</body>
</html>