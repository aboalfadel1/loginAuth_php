<?php include "connection.php"; 


?>

<?php include "templates/header.php" ?>

<div class="container">
    <h3><?php
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION["msg"];
                        unset($_SESSION["msg"]);
                    }
                  else if(isset($_SESSION["faild"])){
                    echo $_SESSION["faild"];
                    unset ($_SESSION["faild"]);
                   }
        
                    ?></h3>
    <h1>Willkommen Bitte Login</h1>
    <form action="" method="POST">
        <p>Username <input type="text" name="username"></p>
        <p>Password &nbsp;<input type="password" name="password"></p>
        <input type="submit" name="submit" value="Login">
        <p><a href="register.php">Register</a> &nbsp; &nbsp; &nbsp;&nbsp;<a href="forget_pass.php">Password
                vergessen
                ?</a></p>
    </form>

</div>
<?php
    if(isset($_POST['submit'])){
        $username=$_POST["username"];
        $password=$_POST["password"];
        $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
        $res=mysqli_query($conn,$sql) or die("fehler");
        
        if( mysqli_num_rows($res)==1 ){
            session_start();
            $_SESSION["user"]=$username;
            header("location:index.php");
       
        }
        else {
            echo "fail";
         
            $_SESSION["faild"]="Password or username doesnt match";
          
        }
    }

    
    ?>
</body>

</html>