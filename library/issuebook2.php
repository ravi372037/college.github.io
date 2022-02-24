<?php
session_start();
include "db.php";

if(isset($_SESSION['enrollno']))

 
 { ?>

<?php
$enrollno=$_SESSION['enrollno'];

$sql = "SELECT * FROM student WHERE enrollno='$enrollno'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) === 1)
{
    $row=mysqli_fetch_assoc($result);
    if($row['enrollno'] === $enrollno)
        {
        $name=$row['sname'];
        $fname=$row['fname'];
        $branch=$row['branch'];
        $sem=$row['sem'];
        $mobile=$row['mobile'];
       
        $address=$row['address'];
        $image="../student/upload/".$row['image'];
       
        
        } 
}
?>

<html lang="en">

<head>
    <style>
        #back
        {
            
            height: 40px;
            width: 100px;
            background-color: #007BFF;
            border: 1px solid #07549b;
            border-radius: 5px 5px 5px 5px;
            font-size: 20px;
            color: white;
            
        }
        #back:hover
        {
            border: 1px solid #07549b;
            cursor: pointer;
            color: #007BFF;
            background-color: white;
            box-shadow: 0px 0px 5px 5px #14c9f7;
        }
        #ibtn
        {
            height: 40px;
            background-color: #28A745;
            border: 2px solid green;
            border-radius: 5px 5px 5px 5px;
            font-size: 20px;
            color: white;
            
        }
        #ibtn:hover
        {
            cursor: pointer;
            color: #28A745;
            box-shadow: 0px 0px 5px 5px #22e643;
            border: 1px solid green;
            background-color: white;
        }
        #cbtn
        {
            height: 40px;
            width: 100px;
            background-color: red;
            border: 2px solid #861315;
            color: white;
            border-radius: 5px 5px 5px 5px;
            font-size: 20px;
            
        }
        #cbtn:hover
        {
            
            cursor: pointer;
            box-shadow: 0px 0px 0px 0px ;

            color: red;
            box-shadow: 0px 0px 5px 5px #fa4444;
            border: 1px solid #CC292D;
            background-color: white;
        }

    </style>
    <title>Admin Panel</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->


    <!-- Common Css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->


    <!-- Nav Css -->
    <link rel="stylesheet" href="css/style4.css">
    <!--// Nav Css -->


    <!-- Fontawesome Css -->
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--// Fontawesome Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</head>

<body>

    <div class="wrapper" >
        <!-- Sidebar Holder -->
        







        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
            <nav class="navbar navbar-default mb-xl-5 mb-4" style="background-color: #0b660b;">
                <div class="container-fluid">

                    <div class="navbar-header">
                       
                    </div>
                    <h1 style="color: white;">Libray Management</h1>
                    <ul class="top-icons-agileits-w3layouts float-right"></ul>
                </div>
            </nav>
            <!--// top-bar -->

            <div class="container-fluid">
                
                <a href="issuebook.php"><button id="back"><i class="fa fa-reply" aria-hidden="true"></i> Back </button></a>
                    <hr>
                    <?php
                        if($_SERVER['REQUEST_METHOD']=='POST')
                        {
                            $select=$_POST['select'];
                            $bookname=$_POST['bookname'];
                            $otherbook=$_POST['otherbook'];
                            $bookno=$_POST['bookno'];
                            $isseudate=date("Y-m-d");
                            $validity=15;
                            $enrollno=$_SESSION['enrollno'];
                            
                            if($select=='Select Book')
                            {
                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> Please Select Book.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                            }
                            else
                            {
                                if($bookname=='other')
                            {
                                $t="SELECT * FROM bookstock WHERE   bookname='$otherbook'";
                                $rslt=mysqli_query($con,$t);
                                if($rslt)
                                {
                                    $rw=mysqli_fetch_assoc($rslt);
                                    $qunt=number_format($rw['quantity']);
                                    
                                    if($qunt==0)
                                    {
                                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Error ! '.$otherbook.'</strong> 0 book available in Library.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                                       
                                    }
                                    else
                                    {
                                    $insert="INSERT INTO `library` (`enrollno`, `bookname`, `bookno`, `issuedate`, `validity`, `sname`, `branch`, `sem`) VALUES 
                                    ('$enrollno', '$otherbook', '$bookno', '$isseudate', '$validity', '$name', '$branch', '$sem')";
                                    $result=mysqli_query($con, $insert);
                                    
                                    $newq=$qunt-1;

                                    $updt="UPDATE bookstock SET quantity='$newq' WHERE  bookname='$otherbook'";
                                    $uq=mysqli_query($con,$updt);
                                    if($uq && $result)
                                    {
                                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success!</strong> Book Issue Successfull.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>';
                                    }
                                    else
                                    {
                                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error!</strong> Book Issue Not Successfull.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>';
                                    }
                                    }
                            
                                }
                            }
                            else
                            {
                                $t="SELECT * FROM bookstock WHERE branch='$branch' AND bookname='$bookname'";
                                $rslt=mysqli_query($con,$t);
                                if($rslt)
                                {
                                    $rw=mysqli_fetch_assoc($rslt);
                                    $qunt=number_format($rw['quantity']);
                                    
                                    if($qunt==0)
                                    {
                                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Error ! '.$bookname.'</strong> 0 book available in Library.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                                       
                                    }
                                    else
                                    {
                                    $insert="INSERT INTO `library` (`enrollno`, `bookname`, `bookno`, `issuedate`, `validity`, `sname`, `branch`, `sem`) VALUES 
                                    ('$enrollno', '$bookname', '$bookno', '$isseudate', '$validity', '$name', '$branch', '$sem')";
                                    $result=mysqli_query($con, $insert);
                                    
                                    $newq=$qunt-1;

                                    $updt="UPDATE bookstock SET quantity='$newq' WHERE branch='$branch' AND bookname='$bookname'";
                                    $uq=mysqli_query($con,$updt);
                                    if($uq && $result)
                                    {
                                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success!</strong> Book Issue Successfull.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>';
                                    }
                                    else
                                    {
                                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error!</strong> Book Issue Not Successfull.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>';
                                    }
                                    }
                            
                                }
                            }
                            }
                            

                              

                            
                            
                        }
                    ?>
                    <div class="row">
                        
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10" style="background-color: white; border: 1px solid #c2c1c1; border-radius: 10px; box-shadow: 0px 0px 3px 3px #d1d0d0;">
                            <br>
                            <h2 style="text-align: center; background-color: #17A2B8; color: white;">Student Details</h2>
                            <hr>
                            <div class="row">

                                <div class="col-sm-8">
                                    <table class="table table-bordered table-hover">
                                            <tr>
                                                <th>Student Id </th>
                                                <td "><?=$enrollno?></td>
                                                </th>
                                            </tr> 
                                            <tr>
                                                <th>Name </th>
                                                <td><?=$name?></td>

                                            </tr>
                                            <tr>
                                                <th>Father's Name </th>
                                                <td ><?=$fname?></td>

                                            </tr>
                                            <tr>
                                                <th>Branch </th>
                                                <td ><?=$branch?></td>

                                            </tr>
                                            <tr>
                                                <th>Semester </th>
                                                <td><?=$sem?></td>

                                            </tr>
                                            <tr>
                                                <th>Mobile No </th>
                                                <td ><?=$mobile?></td>
                                            </tr>
                                            
                                            <tr>
                                                <th>Address </th>
                                                <td><?=$address?></td>
                                            </tr>
                                        
                                    </table>
                                </div>
                                <div class="col-sm-4" style="margin-bottom: 5px; height: 305px;">
                                    <h1 style="font-size: 20px; text-align: center;">Student Photo</h1>
                                    <hr>
                                    <center><img src="<?=$image?>" class="img img-responsive img-thumbnail" width="180px" height="220px" ></center>
                                    <br>
                                </div>
                                
                            </div>
                        </div>


                    </div>
                    <br>
                    
                        
                       
                    
                
                    
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <form method="POST">
                                <div class="row">
                                    
                                    <div class="col-sm-5">
                                        <label>Book Name :</label>
                                        <select class="form-control" onchange='checkvalue(this.value)' name="select">
                                                <option value="Select Book">Select Book</option>
                                        <?php
                                            include "db.php";
                                            $tb="SELECT * FROM `bookstock` WHERE branch='$branch' AND sem='$sem'";
                                            
                                            $r=mysqli_query($con,$tb);
                                            if($r)
                                            { 
                                            $i=1;
                                            while($row = mysqli_fetch_assoc($r))
                                            { ?>
                                                <option value="<?=$row['bookname']?>"><?=$i?>. <?=$row['bookname']?> -Quantity <?=$row['quantity']?></option>    
                                            <?php $i++;   } ?>
                                            <?php } ?>
                                                <option value="other">Other</option>
                                        </select>

                                    </div>
                                    
                                   <div class="col-md-1"></div>
                                    <div class="col-sm-4">
                                        <label>Book Number :</label>
                                        <input type="text" placeholder="Enter Book No"  class="form-control" required name="bookno">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-5">
                                    <input type="text"   style='display:none' class="form-control" placeholder="Enter Book Name" />  
                                    <input placeholder="Enter Book Name" class="form-control" list="browsers" name="otherbook" id="other" style="display: none;">
                                    <datalist id="browsers">
                                        <?php
                                        $tb="SELECT * FROM `bookstock`";
                                        $qu=mysqli_query($con,$tb);
                                        $i=1;
                                        while($r=mysqli_fetch_assoc($qu))
                                        { ?>
                                        <option value="<?=$r['bookname']?>" >
                                        Quantity-<?=$r['quantity']?>
                                        
                                    <?php
                                    $i++;} 
                                    ?>
    
                                    </datalist>  
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" id="book" style="display: none;" name="bookname">
                            
                                    </div>
                                </div>
                            
                                <br>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-3">
                                        <button id="ibtn"  type="submit" >Issue Book</button>
                                    </div>
                                    <div class="col-sm-1">
                                        <br>
                                    </div>
                                    <div class="col-sm-3">
                                        <button id="cbtn" type="reset">Clear</button>
                                    </div>
                                </div>
                                <br>
                     
                            </form>
                           
                        </div>
                    </div>
                    
            </div>

            <!-- Copyright -->
            <div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="background-color: #0b660b;">
                <p style="color: white;">© 2021 Library Adda24 . All Rights Reserved | Design by
                    <a href="#" style="text-decoration: none; color: white;"> Team Ravi </a>
                </p>
            </div>
            <!--// Copyright -->
        </div>

    </div>
   


    <!-- Required common Js -->
    <script src='js/jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->



    <!-- Sidebar-nav Js -->
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

    <!-- Js for bootstrap working-->
    <script src="js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->
    <script type="text/javascript">
    function checkvalue(val)
{
    document.getElementById('book').value=val;
    if(val==="other")
       document.getElementById('other').style.display='block';
    else
       document.getElementById('other').style.display='none'; 
}


</script> 

</body>

</html>
<?php } ?>