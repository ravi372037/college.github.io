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
      #rtn
        {
            height: 35px;
            width: 100px;
            background-color: #28A745;
            border: 1px solid green;
            border-radius: 5px 5px 5px 5px;
            font-size: 20px;
            color: white;
          
            
        }
        #rtn:hover
        {
            cursor: pointer;
            color: #28A745;
            box-shadow: 0px 0px 5px 5px #22e643;
            border: 1px solid green;
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
        






            </ul>
        </nav>

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
                
                <a href="returnbook.php"><button id="back"><i class="fa fa-reply" aria-hidden="true"></i> Back </button></a>
                    <hr>
                    <?php
                    if(isset($_GET['msg']))
                            { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> <?=$_GET['msg']?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php } ?>
                            <?php
                    if(isset($_GET['error']))
                            { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> <?=$_GET['error']?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php } ?>
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
                                                <th>Student Id :</th>
                                                <td "><?=$row['enrollno']?></td>

                                                </th>
                                            </tr>
                                    
                                        
                                            <tr>
                                                <th>Name :</th>
                                                <td><?=$row['sname']?></td>

                                            </tr>
                                            <tr>
                                                <th>Father's Name :</th>
                                                <td ><?=$row['fname']?></td>

                                            </tr>
                                            <tr>
                                                <th>Branch :</th>
                                                <td ><?=$row['branch']?></td>

                                            </tr>
                                            <tr>
                                                <th>Semester :</th>
                                                <td><?=$row['sem']?></td>

                                            </tr>
                                            <tr>
                                                <th>Mobile No :</th>
                                                <td ><?=$row['mobile']?></td>
                                            </tr>
                                           
                                            <tr>
                                                <th>Address :</th>
                                                <td><?=$row['address']?></td>
                                            </tr>
                                        
                                    </table>
                                </div>
                                <div class="col-sm-4" style="margin-bottom: 5px; height: 305px;">
                                    <h1 style="font-size: 20px; text-align: center;">Student Photo</h1>
                                    <hr>
                                    <center><img src="<?=$image?>" class="img img-responsive img-thumbnail" width="200px" height="250px" ></center>
                                    <br>
                                </div>
                                
                            </div>
                        </div>


                    </div>
                    <br>
                    
                    <hr>

                    <h3 style="text-align: center;">Issue book</h3>
                    <hr>
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <?php
                                $enrollno=$_SESSION['enrollno'];

                                $tb= "SELECT * FROM `library` WHERE enrollno='$enrollno'";
                                $result =mysqli_query($con,$tb);

                            ?>
                            <?php
                if(mysqli_num_rows($result)>0)
                { 
                   
                    ?>
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th style="background-color: #17A2B8; color: white;">Sr.No.</th>
                                    <th style="background-color: #17A2B8; color: white;">Book Name</th>
                                    <th style="background-color: #17A2B8; color: white;">Book No</th>
                                    <th style="background-color: #17A2B8; color: white;">Issue Date</th>
                                    <th style="background-color: #17A2B8; color: white;">Valadity</th>
                                    <th style="background-color: #17A2B8; color: white;"></th>
                                </tr>
                                <?php
                          $i=1;
                          while($row = mysqli_fetch_assoc($result))
                          { ?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$row['bookname']?></td>
                                    <td><?=$row['bookno']?></td>
                                    <td><?=$row['issuedate']?></td>
                                    <td><?=$row['validity']?></td>
                                    <td><a href='delete.php?$no=<?=$row['bookno']?>'><button type="submit" id="rtn">Return</button></a></td>
                                </tr>
                         <?php $i++; } 
                         
                         ?>
                            </table>
                            <?php } 
                            else
                            {   
                                echo  '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Massage!</strong> "No Book Here.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                            }
                            ?>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>

                    <br>
                    <hr>

                    <h3 style="text-align: center;">Over Date Book</h3>
                    <hr>
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <?php
                                $enrollno=$_SESSION['enrollno'];

                                $tb= "SELECT * FROM `overdate` WHERE enrollno='$enrollno'";
                                $result =mysqli_query($con,$tb);

                            ?>
                            <?php
                if(mysqli_num_rows($result)>0)
                { 
                   
                    ?>      
                            <table class="table table-bordered table-hover">
                                <tr>
                                    
                                    <th style="background-color: #17A2B8; color: white;">Sr.No.</th>
                                    <th style="background-color: #17A2B8; color: white;">Book Name</th>
                                    <th style="background-color: #17A2B8; color: white;">Book No</th>
                                    <th style="background-color: #17A2B8; color: white;">Issue Date</th>
                                    <th style="background-color: #17A2B8; color: white;">Overday</th>
                                    <th style="background-color: #17A2B8; color: white;">Penalty</th>
                                    <th style="background-color: #17A2B8; color: white;">Action</th>
                                    
                                </tr>
                                <?php
                          $i=1;
                          while($row = mysqli_fetch_assoc($result))
                          { ?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$row['bookname']?></td>
                                    <td><?=$row['bookno']?></td>
                                    <td><?=$row['issueedate']?></td>
                                    <td><?=$row['overday']?></td>
                                    <td><?=$row['penalty']?> <i class="fas fa-rupee-sign"></td>
                                    
                                    <td><a href='delete2.php?$no=<?=$row['bookno']?>'><button type="submit" id="rtn">Return</button></a</center></td>
                                </tr>
                         <?php $i++; } 
                         
                         ?>
                            </table>
                          
                            <?php } 
                            else
                            {   
                             echo  '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                             <strong>Massage!</strong> "No Book Here.
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                           </div>';
                            }
                            ?>
                        </div>
                        <div class="col-sm-1"></div>
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

</body>

</html>
<?php }?>