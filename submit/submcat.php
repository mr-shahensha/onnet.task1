<?php include("../connection.php");
if(isset($_POST['submit'])){
    $cat_nm=$_REQUEST['cat_name'];
    date_default_timezone_set("asia/kolkata");
    $date = date('Y-m-d');
    $time = date( "H:i:s");
    $query1=mysqli_query($con,"INSERT INTO `category` (`sl`, `cat_nm`, `edt`, `edtm`) VALUES (NULL, '$cat_nm', '$date', '$time');");
}

?>
<script>
    alert("done");
     document.location="../category.php";
</script>
