<?php
$server="localhost";
$username="root";
$password="";
$database="task1";
if(!$con=mysqli_connect($server,$username,$password,$database)){
    echo "failed to connect !!";
}

?>