<?php
$conn=new mysqli("localhost","root","","login");
if($conn){
    echo "seccess";
}
else {
echo "faild";
}
?>