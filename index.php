<?php 
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password ="";

    $con=mysqli_connect($server,$username,$password);

    if(!$con){
        die("connectionto this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connection to the db";

    $name = $_POST['name'];
    $gender =$_POST['gender'];
    $age =$_POST['age'];
    $email =$_POST['email'];
    $phone =$_POST['phone'];
    $desc =$_POST['desc'];

    $sql = "INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', CURRENT_TIMESTAMP);";
    

    if($con->query($sql) == true){
       // echo "succesfully inserted";
       $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="LPU">
    <div class="container">
    <h1>WELCOME TO LOVELY PROFESSIONAL UNIVERSITY TRIP</h1>
    <p>confirm your seat trip for Dharmashala and Manali</p>
    <?php
     if($insert == true){
     echo "<p class='submit'>Thanks for submitting form. we are happy to see you in our trip</p>";
     }
    ?>
    <form action="index.php" method="post">
    <input type="text" name="name" id="name" placeholder="Enter your name">
    <input type="text" name="age" id="age" placeholder="Enter your age">
    <input type="text" name="gender" id="gender" placeholder="Enter your gender">
    <input type="email" name="email" id="email" placeholder="Enter your email">
    <input type="phonne" name="phone" id="phone" placeholder="Enter your phone number">
    <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Write something"></textarea>
    <button class="btn">submit</button>
    <!--INSERT INTO `trip` (`Sno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'vishal shrivastav', '23', 'male', 'shrivastavsahil293@gmail.com', '0504027631', 'hi', CURRENT_TIMESTAMP); -->
    </form>
    </div>
    
    <script src="index.js"></script>
</body>
</html>