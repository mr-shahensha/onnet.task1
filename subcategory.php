<?php include("connection.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="jquery-1.6.4.min.js"></script>
    <title>subcategory page</title>
</head>
<body>
    <h2>category page</h2>
       <!-- navbar -->
       <table border="2">
        <tr>
            <td><a href="category.php">category</a></td>
            <td><a href="subcategory.php">sub category</a></td>
            <td><a href="product.php">product</a></td>
            <td><a href="search.php">search</a></td>

        </tr>
    </table>
    <br>
    <br>
    <form action="submit/submscat.php" method="post" onsubmit="return validation()">
    <table border="2">
        <tr>
        <td>category name :</td>
            <td>
                <select name="cate" id="cate" onchange="return hidewarn()" >
                    <option value="">select category</option>
                    <?php
                    $query=mysqli_query($con,"SELECT * FROM `category`");
                    while($result=mysqli_fetch_assoc($query)){
                            $sl=$result['sl'];
                            $cat_nm=$result['cat_nm'];
                    
                    ?>
                    <option value="<?php echo $sl;?>"><?php echo $cat_nm; ?></option>
                    <?php
                }?>
                </select>
            </td>
        </tr>
        <tr>
            <td>category name</td>
    <td><input type="text" placeholder="enter subcategory name " name="sub_cat_name" id="subcate" onkeyup="return hidewarn2()"></td>
</tr>
<tr>    <td><input type="submit" value="submit" name="submit"></td>
</tr>
    </table>
    </form>
    <br><b><p id="warn" style="color:red;"></p></b> 
    <br><b><p id="warn2" style="color:red;"></p></b> 
</body>
<script>
    function validation(){
        var cate=document.getElementById("cate").value;
        var subcate=document.getElementById("subcate").value;

        if(cate==""){
            text="please select your category";
            document.getElementById("warn").innerHTML=text;
            return false;
        } 
        if(subcate==""){
            text="please write your subcategory";
            document.getElementById("warn2").innerHTML=text;
            return false;
        }  
        if(subcate.length<3){
            text="please write your subcategory";
            document.getElementById("warn2").innerHTML=text;
            return false;
        }     
    }
    function hidewarn(){
        document.getElementById("warn").innerHTML="";
    }
    function hidewarn2(){
        document.getElementById("warn2").innerHTML="";
    }
</script>
</html>