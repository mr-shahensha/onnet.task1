<?php include("../connection.php");
if(isset($_POST['submit'])){
$sl=$_REQUEST['sl'];
$cn=$_REQUEST['cn'];
$scn=$_REQUEST['scn'];
$pnm=$_REQUEST['pnam'];
echo $sl;
echo "<br>";
echo $cn;
echo "<br>";
echo $scn;
echo "<br>";
echo $pnm;
$query0=mysqli_query($con,"SELECT * FROM `product` where sl='$sl'");
while($result=mysqli_fetch_assoc($query0)){
    $category0=$result['cat_nm'];
    $subcat0=$result['sub_cat_nm'];
    $prod0=$result['product_name'];
}
echo "<br>";

echo $category0;

if($cn==$category0 && $scn==$subcat0 && $pnm==$prod0){
    ?>
<script>
alert("data already exist !!");
 document.location="../product.php";
</script>
    <?php
}else{
$query=mysqli_query($con,"UPDATE `product` SET `product_name` = '$pnm', `cat_nm` = '$cn' , `sub_cat_nm` = '$scn' WHERE `product`.`sl` = '$sl'; ");

}}?>
<script>
    //alert("done");
    //  document.location="../product.php";
</script>