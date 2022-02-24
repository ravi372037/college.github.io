<?php
include "db.php";
if($con)
 


$bookno=$_GET['$no'];

$q="SELECT * FROM `overdate` WHERE bookno='$bookno'";
$result=mysqli_query($con,$q);
$row=mysqli_fetch_assoc($result);
$enrollno=$row['enrollno'];
$sname=$row['name'];
$branch=$row['branch'];
$sem=$row['sem'];
$bookname=$row['bookname'];
$bkno=$row['bookno'];
$issuedate=$row['issueedate'];
$returndate=date("d-m-Y");
$overday=$row['overday'];
$penalty=$row['penalty'];

   $insert="INSERT INTO `overdaterecord` (`enrollno`,`name`, `branch`, `sem`, `bookname`, `bookno`, `issuedate`, `returndate`, `overday`, `penalty`) 
   VALUES ('$enrollno','$sname', '$branch', '$sem', '$bookname', '$bkno', '$issuedate', '$returndate', '$overday', '$penalty')";

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
   
   $dlt="DELETE FROM overdate WHERE bookno='$bookno'";
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