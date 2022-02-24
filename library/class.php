<?php
include "db.php";
//computer sceince total
$sctb="SELECT * FROM library WHERE branch='Computer Science Engineering' AND sem='5th Semester'";
$qry=mysqli_query($con,$sctb);
$rn= mysqli_num_rows($qry);




?>