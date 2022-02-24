<?php
include "db.php";


if(isset($_POST['submit']))
{
      
}
else
{
    $name=$_POST['name'];
    $file=$_FILES['photo'];

    

    $filename = $file['name'];
    $filepath = $file['tmp_name'];
    $fileerror = $file['error'];
    
    if($fileerror == 0)
    {
        $destfile = 'upload/'.$filename;
        //echo "$destfile";
        move_uploaded_file($filepath,$destfile);

        $insert = "INSERT INTO `im` (`name`, `image`) VALUES ('$name', '$destfile')";
        $q= mysqli_query($con,$insert);
        if($q)
        {
            echo "submit";
        }
        else
        echo "not";
    }
}

?>

<form  method="POST" enctype="multipart/form-data">
<input type="name" placeholder="name" name="name">
<br>
<br>
<input type="file" name="photo" >
<br>
<br>
<input type="submit" value="submit">
</form>