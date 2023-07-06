<?php include("connection.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product page</title>
    <script type="text/javascript" src="jquery-1.6.4.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" /><style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 48
}
</style>
</head>
<body>
    <h2>product page</h2>
    <!-- navbar -->
    <table border="2">
        <tr>
            <td><a href="category.php">category</a></td>
            <td><a href="subcategory.php">sub category</a></td>
            <td><a href="product.php">product</a></td>
            <td><a href="search.php">search</a></td>
        </tr>
    </table>
    <br><br>
    <!-- this is insert table -->
    <section>
        <form action="submit/subproduct.php" method="post" enctype="multipart/form-data" >
    <table border="2">
        <tr>
        <td>category name :</td>
            <td>
                <select name="cate" id="category" onchange="fun(this.value)">

                    <option value="">select category</option>
                    <?php 
                    $query=mysqli_query($con,"SELECT * FROM `category` ");
                    while($result=mysqli_fetch_assoc($query)){
                        $sl=$result['sl'];
                        $cat=$result['cat_nm'];
                    
                    ?>
                    <option value="<?php echo $sl;?>"><?php echo $cat; ?></option>
                    <?php
                 }?>
                </select>
            </td>
        </tr>
        <tr>
        <td>subcategory name :</td>
            <td>
                <div id="subcate2">
                <select name="subcategory" >
                    <option value="">select subcategory</option>
                </select>
                </div>

            </td>
        </tr>
        <tr>
            <td>product name</td>
    <td><input type="text" placeholder="enter product name " name="prod_name" id="pnid"></td>
</tr>
<tr>
    <td>
        Image : 
    </td>
    <td>
    <input type="file" name="img" id="img">
    </td>
</tr>
<tr>    <td><input type="submit" value="submit" name="submit"></td>
</tr>
    </table>
    </section>
    </form>
<br><br>
    <!-- this is retrieve data -->
    <table border="2">
        <tr style="text-style:bold;">
            <td>number</td>
            <td><b>category</b></td>
            <td><b>sub category</b></td>
            <td><b>product name</b></td>
            <td><b>edit</b></td>
            <td><b>delete</b></td>
        </tr>
        <?php 
        $query1=mysqli_query($con,"SELECT * FROM `product`");
        while($result1=mysqli_fetch_assoc($query1)){
            $sl=$result1['sl'];
            $cat_nm=$result1['cat_nm'];
            $sub_cat_nm=$result1['sub_cat_nm'];
            $product_name=$result1['product_name'];
        ?>
        <tr>
            <td><?php echo $sl;?></td>
            <td><?php 
            $query2=mysqli_query($con,"select * from category where sl=' $cat_nm'");
            while($result2=mysqli_fetch_assoc($query2)){
                $catnm=$result2['cat_nm'];
            }
            echo $catnm;
           ?></td>
            <td><?php 
            $query3=mysqli_query($con,"select * from subcategory where sl=' $sub_cat_nm'");
            while($result3=mysqli_fetch_assoc($query3)){
                $subcatnm=$result3['sub_cat_nm'];
            }
            echo $subcatnm;?></td>
            <td><?php echo  $product_name;?></td>
            <td>
                <a href="edit.php?sl=<?php echo $sl; ?>"><span class="material-symbols-outlined">
edit
</span></a></td>
            <td><a href="delete.php?sl=<?php echo $sl; ?>"><span class="material-symbols-outlined">
delete
</span></a></td>
        </tr>
        <?php
        }?>
    </table>

    <br><b><p id="warn" style="color:red;"></p></b> 
    <b><p id="warn2" style="color:red;"></p></b> 

</body>
<script>
        function fun(category){

            $('#subcate2').load('getsubcat.php?category='+category).fadeIn('fast');
        }
    </script>
</html>
