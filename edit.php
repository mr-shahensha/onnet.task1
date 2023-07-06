<?php
include("connection.php");
$sl=$_REQUEST['sl'];
$query=mysqli_query($con,"select * from product where sl='$sl'");
while($result=mysqli_fetch_assoc($query)){
    $cat_nm=$result['cat_nm'];
    $sub_cat_nm=$result['sub_cat_nm'];
    $product_name=$result['product_name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>edit</title>
    <script type="text/javascript" src="jquery-1.6.4.min.js"></script>
</head>
<body>
    <form action="submit/subedit.php" method="post">
        <input type="hidden" value="<?php echo $sl;?>" name="sl">
    <table border="2">
        <tr>
            <td>category name :</td>
            <td><select name="cn" id="" onchange=fun2(this.value)>
                <option value="">select category</option>
                <?php 
                $query2=mysqli_query($con,"select  * from category");
                while($result2=mysqli_fetch_assoc($query2)){
                    $cat_sl=$result2['sl'];
                    $cat_nm2=$result2['cat_nm']
                
                ?>
                <option value="<?php echo  $cat_sl;?>" <?php
                if($cat_nm==$cat_sl){
                        echo 'selected';
                }
                ?> ><?php echo $cat_nm2;?></option>
                <?php 
                }
                ?>
            </select></td>
        </tr>
        <tr>
            <td>sub category name :</td>
            <td>
            <div id="scnid">
            <select name="scn" id="scnid">
                <option value="">select subcategory</option>
                <?php 
                $query3=mysqli_query($con,"select * from subcategory");
                while($result3=mysqli_fetch_assoc($query3)){
                    $sub_cat_sl=$result3['sl'];
                    $sub_cat_nm2=$result3['sub_cat_nm'];
                ?>
                <option value="<?php echo $sub_cat_sl ;?>" <?php 
                if($sub_cat_nm==$sub_cat_sl){ echo "selected";}
                ?>><?php
                echo  $sub_cat_nm2;?></option>
                <?php 
                }?>
            </select>
            </div>    
           </td>
        </tr>
        <tr>
            <td>product name :</td>
            <td><input type="text" value="<?php echo  $product_name?>" name="pnam"></td>
        </tr>
        <tr>
            <td> <input type="submit" value="submit" name="submit"></td>
        </tr>
    </table>
    </form>
</body>
</html>

<script>
    function fun2(scvalue){
        $("#scnid").load('edit2.php?scvalue='+scvalue).fadeIn('fast');
    }
</script>