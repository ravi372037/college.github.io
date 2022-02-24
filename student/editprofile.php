<?php
include "db.php";
session_start();
if(isset($_SESSION['enrollno']))
$enrollno=$_SESSION['enrollno'];
{ ?>

<?php
if($_SERVER['REQUEST_METHOD']== 'POST')
{
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $address=$_POST['address'];

        $filename =$_FILES["image"]["name"];
        $tempname =$_FILES["image"]["tmp_name"];
        $folder = "upload/".$filename;
        move_uploaded_file($tempname,$folder);

    
    $query ="select * from student where email = '$email'";
          $res = mysqli_query($con, $query);
          $n=mysqli_num_rows($res);
          
          $query1 ="select * from student where mobile = '$mobile'";
          $res2 = mysqli_query($con, $query1);
          $n2=mysqli_num_rows($res2);
    if($n)
    {
        header("Location:editprofile.php?error=Email id aready register try diffrent email id.");
    }
    elseif($n2)
    {
        header("Location:editprofile.php?error=Mobile no aready register try diffrent mobile no.");
    }
    else
    {
        $q= "UPDATE student SET mobile='$mobile', email='$email', address='$address', image='$filename' WHERE enrollno='$enrollno' ";
        $result=mysqli_query($con,$q);
        if($result)
        {
            header("Location:editprofile.php?msg=Record Update.");
        }
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
        #sbtn
        {
            width: 100px;
            height: 40px;
            background-color: #28A745;
            border: 2px solid green;
            border-radius: 5px 5px 5px 5px;
            font-size: 20px;
            color: white;
            
        }
        #sbtn:hover
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
            margin-left:100px;
            
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


</head>

<body>

    <div class="wrapper" >
        <!-- Sidebar Holder -->
        
        </nav>

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
            <nav class="navbar navbar-default mb-xl-5 mb-4" style="background-color: #178fdf;">
                <div class="container-fluid">

                    <div class="navbar-header">
                       
                    </div>
                    <h1 style="color: white;">Libray Management</h1>
                    <ul class="top-icons-agileits-w3layouts float-right"></ul>
                </div>
            </nav>
            <!--// top-bar -->

            <div class="container-fluid">
                
                <a href="index.php"><button id="back"><i class="fa fa-reply" aria-hidden="true"></i> Back </button></a>
                    <hr>
                    <?php
                            if(isset($_GET['error']))
                            { ?>
                            <div class="alert alert-danger" role="alert">
                                <?=$_GET['error']?>
                            </div>
                            <?php } ?>
                    <?php
                            if(isset($_GET['msg']))
                            { ?>
                            <div class="alert alert-success" role="alert">
                                <?=$_GET['msg']?>
                            </div>
                            <?php } ?>
                    <div class="row">
                        
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6" style="background-color: white; border: 1px solid #c2c1c1; border-radius: 10px; box-shadow: 0px 0px 3px 3px #d1d0d0;">
                            
                            <hr>
                            <form method="POST" enctype="multipart/form-data">
                                    <table class="table table-bordered table-hover">
                                        
                                            <tr>
                                                <th>Mobile No :</th>
                                                <td><input type="text" class="form-control" name="mobile" maxlength="10"></td>
                                            </tr>
                                            <tr>
                                                <th>Email Id:</th>
                                                <td><input type="text" class="form-control" name="email" maxlength="50"></td>
                                            </tr>
                                            <tr>
                                                <th>Address :</th>
                                                <td><textarea class="form-control" style="resize: none;" name="address"></textarea></td>
                                            </tr>  
                                            <tr>
                                                <th>Image :</th>
                                                <td><input type="file" class="form-control" name="image"></td>
                                            </tr> 
                                                                                  
                                    </table>
                                    <center>
                                        <button id="sbtn" type="submit">Save</button>
                                        <button id="cbtn" type="reset">Clear</button>
                                    </center>
                                
                                </div>
                               
                                    
                                
                                </form>
                      


                    </div>
                    
                    
            </div>

            <!-- Copyright -->
            <div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="background-color: #178fdf;">
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