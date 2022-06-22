<?php session_start() ?>
<?php include "connection.php"; ?>

<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "connection.php"; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>

</head>

<body>
    <div class="container">
        <h1>Ihre Personal Info Vollständig eingaben</h1>
        <form action="" method="POST">
            <p>Username <input type="text" placeholder="Benutzername zum Login" name="username"></p>
            <p>password <input type="password" name="password"></p>
            <p><input type="submit" name="submit" id="" value="Register"></p>
        </form>
    </div>
=======
<?php include "templates/header.php" ?>

<div class="container">
    <h1>Ihre Personal Info Vollständig eingaben</h1>
    <form action="" method="POST">
        <p>Username <input type="text" placeholder="Benutzername zum Login" name="username"></p>
        <p>password <input type="password" name="password"></p>
        <p><input type="submit" name="submit" id="" value="Register"></p>
    </form>
</div>
>>>>>>> a51edef (after modified)
</body>
<?php
if(isset($_POST["submit"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    if(empty($username))
    {
        echo "username cant be empty";
    }
    elseif(empty($password))
    {
        echo "password cant be empty";
    }
    else
    {
        $password=$_POST["password"];

        $sql="INSERT INTO users (username, password) VALUES ('$username','$password')";
        $res=mysqli_query($conn,$sql) or die();
        if($res==true){
            $_SESSION["msg"]="User is success registered";
        }
        else {
            echo "failed to add user";
        }
        unset($_POST["submit"]);
        header("locatioN:login.php");
    }   

}


?>

</html>
