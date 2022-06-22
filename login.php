<?php include "connection.php"; 


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h3><?php
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION["msg"];
                        unset($_SESSION["msg"]);
                    }
                    if(isset($_SESSION['faild'])){
                        echo $_SESSION["faild"];
                        unset($_SESSION["faild"]);
                    }
        
                    ?></h3>
        <h1>Willkommen Bitte Login</h1>
        <form action="" method="POST">
            <p>Username <input type="text" name="username"></p>
            <p>Password &nbsp;<input type="password" name="password"></p>
            <input type="submit" name="submit">
            <p><a href="register.php">Register</a> &nbsp; &nbsp; &nbsp;&nbsp;<a href="">Password vergessen ?</a></p>
        </form>

    </div>
    <?php
    if(isset($_POST['submit'])){
        $username=$_POST["username"];
        echo $username;
        echo "<br>";
        $password=$_POST["password"];
        echo $password;
        echo "<br>";
        $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
        $res=mysqli_query($conn,$sql) or die("fehler");
        print_r($res);
     
        if( mysqli_num_rows($res)==1 ){
            session_start();
            $_SESSION["user"]=$username;
            header("location:index.php");
            echo "ok0";
        }
        else {
            $_SESSION["faild"]="Password or username doesnt match";
        }
    }

    
    ?>
</body>

</html>