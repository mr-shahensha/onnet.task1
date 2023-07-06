<?php
include("../connection.php");


if(isset($_POST['submit'])){
    date_default_timezone_set("asia/kolkata");
    $date = date('Y-m-d');
    $time = date( "H:i:s");
    if($_POST['cate']!=""){
    $category=$_POST['cate'];
    }else{
        $msg="please insert all data";
    }
    if($_POST['subcategory']!=""){
            $subcategory=$_POST['subcategory'];
            }else{
                $msg="please insert all data";
            }
     if($_POST['prod_name']!=""){
        $prod_name=$_POST['prod_name'];
    }else{
        $msg="please insert all data";
 }
 $msg="";
 if($msg==""){
    $query0=mysqli_query($con,"SELECT * FROM `product`");
    while($result=mysqli_fetch_assoc($query0)){
        $category0=$result['cat_nm'];
        $subcat0=$result['sub_cat_nm'];
        $prod0=$result['product_name'];
    }
        if($category==$category0 && $subcategory==$subcat0 && $prod_name==$prod0)
        {
            ?>
            <script>
        alert("This data already exsist !!");
         document.location="../product.php";
    </script>
                <?php
        }else{ 
              $query=mysqli_query($con,"INSERT INTO `product` (`sl`, `cat_nm`, `sub_cat_nm`, `product_name`, `edt`, `edtm`) VALUES (NULL, '$category', '$subcategory', '$prod_name', '$date', '$time');");
            // img
            mkdir("$category", 0777, true);

              $allowedExtns=array("gif","jpeg","jpg","png","PNG");
              $temp=explode(".",$_FILES["img"]['name']);
              $extension=end($temp);
              if(($_FILES["img"]["size"]<=327680) && in_array($extension,$allowedExtns))
              {
                if($_FILES["img"]["error"]>0){
                    echo "return code : ".$_FILES["img"]["error"]."<br>";
                }else{
                    //$pics="images/$sl."
                    $name="$category.png";
                    $pics="$category/$name";
                    move_uploaded_file($_FILES["img"]["tmp_name"],$pics);
                }
              }else{
                echo "invalid file";
              }
        }
    ?>
<script>
    alert("data inserted");
     document.location="../product.php";
</script>

    <?php
    }else{
       ?>
       <script>
    alert("<?php echo $msg;?>");
     document.location="../product.php";
</script>
       <?php
 }

   }
?>
