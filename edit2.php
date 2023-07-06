<?php
include("connection.php");
$scvalue2=$_REQUEST['scvalue'];

?>

<select name="" id="">
<option value="">subcategory</option>
<?php
$query=mysqli_query($con,"select * from subcategory where sl='$scvalue2'");
while($result=mysqli_fetch_assoc($query)){
    $sl=$result['sl'];
    $newsc=$result['sub_cat_nm'];

    ?>
<option value="<?php echo $sl;?>"><?php echo $newsc;?></option>
    <?php
}
?>

</select>