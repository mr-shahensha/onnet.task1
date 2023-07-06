<?php include("connection.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>category page</title>
    <!-- javascript link -->
    <script type="text/javascript" src="jquery-1.6.4.min.js"></script>
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
    <br><br>
    <form action="submit/submcat.php" method="post" onsubmit="return validation()">
    <table border="2">
        <tr>
            <td>category name</td>
    <td><input type="text" placeholder="enter category name " name="cat_name" id="cname" onkeyup="return hidewarn(this.value)"></td>
    <b><p id="vali1" style="color:red;"></p></b>

    <td><input type="submit" value="submit" name="submit" ></td>
</tr>
    </table>
    </form>
</body>
</html>

<script>
    function validation(){
    var cname=document.getElementById('cname').value;
   
        if(cname==""){
            text="please enter valid data";
                    document.getElementById("vali1").innerHTML=text;
                    return false;

        }
        if(cname.length<3){
            text="please enter valid data";
                    document.getElementById("vali1").innerHTML=text;
                    return false;

        }

    }
        function hidewarn(value){
                 if(value!=''){
                    document.getElementById('vali1').innerHTML=""
                 }
                }   
            
</script>