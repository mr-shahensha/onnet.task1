<?php 
include("connection.php");
$sl=$_REQUEST['sl'];
$query=mysqli_query($con,"delete from product where sl='$sl'")or die(mysqli_error());
?>

<script>
    alert(" deleted ");
    document.location="product.php";
</script>