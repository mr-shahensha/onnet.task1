<?php 
include("connection.php");

if(isset($_GET['submit'])){
    $category=$_REQUEST['category'];
    $subcategory=$_REQUEST['subcategory'];
    $pname=$_REQUEST['pname'];

    if($category=='')
    {
        $q1="";
    }
    else
    {
        $q1=" and cat_nm='$category'";
    }

    if($subcategory=='')
    {
        $q2="";
    }
    else
    {
        $q2=" and sub_cat_nm='$subcategory'";
    }
    if($pname=='')
    {
        $q3="";
    }
    else
    {
        $q3=" and product_name LIKE '%$pname%'";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" /><style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 48
}
</style>
    <title>searching</title>
</head>
<body>
    <!-- this is retrieve data -->
    <table border="2">
        <tr style="text-style:bold;">
        <td><b>number</b></td>
            <td><b>category</b></td>
            <td><b>sub category</b></td>
            <td><b>product name</b></td>
        </tr>
            <?php 
              $query1=mysqli_query($con,"select * from product where sl>0".$q1.$q2.$q3);
              while($result1=mysqli_fetch_assoc($query1)){
                  $sl1=$result1['sl'];
                  $cat_nm1=$result1['cat_nm'];
                  $sub_cat_nm1=$result1['sub_cat_nm'];
                  $product_nm1=$result1['product_name'];
            ?>
                <tr>
                    <td><?php echo $sl1;?> </td>
                    <td><?php echo $cat_nm1;?> </td>
                    <td><?php echo  $sub_cat_nm1;?> </td>
                    <td><?php echo $product_nm1;?> </td>
        </tr>
        <?php
              }
        ?>
</body>
</html>