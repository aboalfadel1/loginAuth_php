<?php
session_start();
include "connection.php";
      include "templates/header.php";?>
<?php
if(isset($_POST["submit"])){
  
    $pass=$_POST["pass"];
    $conf=$_POST["conf"];
    $name=$_POST['name'];

    if(empty($name)){
      $_SESSION["emptyname"]="Name Cant Be Empty";

    }
    if(empty($pass)){
        echo "pass cant be empty";
    }

    else{
        if($conf !=$pass){
      
            $_SESSION["passFail"]="password not matched";
        }
        else{
            $sql="SELECT * FROM users WHERE username='$name'";
            $res=mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)==1){
                $sql="UPDATE users SET password='$pass' WHERE username='$name'";
                if (mysqli_query($conn, $sql)) {
                    $_SESSION["passSuccess"]= "Password updated successfully";
                    header("location:login.php");
                  } else {
                    echo "Error updating record: " . mysqli_error($conn);
                  }
                }
                else {
                    $_SESSION["passFail"]="User name is false";
                }
            }
            
    }

   
        
}


?>
<div class="container">
    <h1>Geben Sie Ihre Password Ernuet</h1>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Username</td>
                <td> <input name="name" type="text" placeholder="Benutzername zum Login"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="pass"></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td> <input type="password" name="conf"></td>
            </tr>
        </table>
        <input type="submit" name="submit">
    </form>
    <h3><?php
        if(isset($_SESSION["passFail"])){
            echo $_SESSION["passFail"];
            unset($_SESSION["passFail"]);
        }
        elseif(isset($_SESSION["emptyname"])){
            echo $_SESSION["emptyname"];
            unset($_SESSION["emptyname"]);
        }
        elseif(isset($_SESSION["emptypass"])){
            echo $_SESSION["emptypass"];
            unset($_SESSION["emptypass"]);
        }
        
    ?></h3>
</div>
</body>

</html>