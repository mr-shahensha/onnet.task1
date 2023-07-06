<?php 
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="jquery-1.6.4.min.js"></script>

    <title>search</title>
</head>
<body>
    <h1>search page</h1>
    <form action="searching.php" method="get" onsubmit="return validation()">
    <table border="2">
    <tr>
        <td>
            
            <select name="category" id="category" onchange="return hidewarn(),fun(this.value)" >

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
        <td>
        <div id="subcate2">
                <select name="subcategory" >
                    <option value="">select subcategory</option>
                </select>
                </div>
        </td>
         <td><input type="text" placeholder="search by entring name" name="pname" id="pname"></td>
        <td>    <input type="submit" value="submit" name="submit">
</td>
    </tr>
    </table>
    <br><b><p id="warn" style="color:red;"></p></b> 

    </form>
</body>
</html>
<script>
    function validation(){
        var pname=document.getElementById("pname").value;
        var category=document.getElementById("category").value;
        if(pname=="" && category==""){
            text="please enter any data";
            document.getElementById("warn").innerHTML=text;
            return false;
        } 
    }
        function fun(category){

            $('#subcate2').load('getsubcat.php?category='+category).fadeIn('fast');
        }
        function hidewarn(){
        document.getElementById("warn").innerHTML="";
    }
    </script>