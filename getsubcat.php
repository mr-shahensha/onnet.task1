<?php include("connection.php");
    $category=$_REQUEST['category'];
?>
<select name="subcategory" id="subcate">
        <option value="">subcategory</option>
        <?php 
        $query=mysqli_query($con,"SELECT * FROM `subcategory` where cat_nm='$category'");
        while($result=mysqli_fetch_assoc($query)){
            $sl=$result['sl'];
            $sub_cat_nm=$result['sub_cat_nm'];
        
        ?>
        <option value="<?php echo $sl;?>"><?php echo $sub_cat_nm; ?></option>
        <?php
    }?>
    </select>
