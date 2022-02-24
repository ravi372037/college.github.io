<?php
include  "db.php";
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $branch=$_POST['branch'];
    $sem=$_POST['sem'];
    $bookname=$_POST['bookname'];
    $quantity=$_POST['quantity'];

    $insert="INSERT INTO `bookstock` (`branch`, `sem`, `bookname`, `quantity`) VALUES ('$branch', '$sem', '$bookname', '$quantity')";
    $q=mysqli_query($con,$insert);
    if($q)
    {
        echo "Submit";
    }
    else
    {
        echo "not";
    }
}

?>

<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form method="POST">
                        <br>
                    <select class="form-control" name="branch" required>
                    <option>-Select Branch-</option>
                    <option value="Computer Science Engineering">1. Computer Science Engineering</option>
                    <option value="Civil Engineering">2. Civil Engineering</option>
                    <option value="Textile Technology">3. Textile Technology</option>
                    
                  </select>
                  <br>
                  <select class="form-control" name="sem" required>
                    <option >-Select Semester-</option>
                    <option value="1st Semester">1st Semester</option>
                    <option value="2nd Semester">2nd Semester</option>
                    <option value="3rd Semester">3rd Semester</option>
                    <option value="4th Semester">4th Semester</option>
                    <option value="5th Semester">5th Semester</option>
                    <option value="6th Semester">6th Semester</option>
                  </select>
                  <br>
                        <input required type="text" name="bookname" placeholder="Book Name" class="form-control">
                        <br>
                        <input required type="number" name="quantity" placeholder="Quantity" class="form-control">
                        <br>
                        <input type="submit" class="btn btn-success"> <input type="reset" class="btn btn-danger">
                    </form>
                </div>
                <div class="col-md-4">
                <?php
include "db.php";
 $tb="SELECT * FROM `bookstock`";
 $r=mysqli_query($con,$tb);
 if($r)
 { ?>

 
    
    <table class="table table-bordered">
            <tr>
                <th>Bookname</th>
            </tr>
            <?php
            $i=1;
    while($row = mysqli_fetch_assoc($r))
    { ?>
        
            <tr>
                <td><?=$row["bookname"]?></td>
            </tr>
        
         
 <?php $i++;   } ?>
 <?php } ?>

 </table>
</div>
            </div>
        </div>
    </body>
</html>
    

 


