<?php
include "db.php";

 


$bookno=$_GET['$no'];

$q="SELECT * FROM `library` WHERE bookno='$bookno'";
$result=mysqli_query($con,$q);
$row=mysqli_fetch_assoc($result);
$enrollno=$row['enrollno'];
$sname=$row['sname'];
$branch=$row['branch'];
$sem=$row['sem'];
$bookname=$row['bookname'];
$bkno=$row['bookno'];
$issuedate=$row['issuedate'];
$returndate=date("d-m-Y");
$validity=$row['validity'];

   $insert="INSERT INTO `returnbook` (`enrollno`, `sname`, `branch`, `sem`, `bookname`, `bookno`, `issuedate`, `returndate`, `validity`) 
    VALUES ('$enrollno', '$sname', '$branch', '$sem', '$bookname', '$bkno', '$issuedate', '$returndate', '$validity');";

$res=mysqli_query($con,$insert);
if($res)
{
   $update="SELECT * FROM bookstock WHERE bookname='$bookname' AND branch='$branch'";
   $upd=mysqli_query($con,$update);
   $num=mysqli_num_rows($upd);

   if($num>0)
   {
   $rr=mysqli_fetch_assoc($upd);
   $quant=number_format($rr['quantity']);
   $newquant=$quant+1;
   $updt="UPDATE bookstock SET quantity='$newquant' WHERE branch='$branch' AND bookname='$bookname'";
   $uq=mysqli_query($con,$updt);
   }
   
   $dlt="DELETE FROM library WHERE bookno='$bookno'";
   $r=mysqli_query($con,$dlt);
   if($r)
   {
     header("Location:return2.php?msg=Book Return Successfully.");
   }
   else
   {
      header("Location:return2.php?error=Book Not Return.");

   }
}

?>