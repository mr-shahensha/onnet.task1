<?php include("../connection.php");
if(isset($_POST['submit'])){
    $cat=$_REQUEST['cate'];
    $sub_cat_name=$_REQUEST['sub_cat_name'];
    date_default_timezone_set("asia/kolkata");
    $date = date('Y-m-d');
    $time = date( "H:i:s");
    $query=mysqli_query($con,"INSERT INTO `subcategory` (`sl`, `cat_nm`, `sub_cat_nm`, `edt`, `edtm`) VALUES (NULL, '$cat', '$sub_cat_name', '$date', '$time');");
}

?>
<script>
    alert("done");
     document.location="../subcategory.php";
</script>
