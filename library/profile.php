<?php
include "db.php";
session_start();
 if(isset($_SESSION['email']) && isset($_SESSION['password']))

 
 { ?>

<?php

$password=$_SESSION['password'];
$username=$_SESSION['email'];

$sql = "SELECT * FROM login WHERE email='$username' AND password='$password'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) === 1)
{
$row=mysqli_fetch_assoc($result);
if($row['password'] === $password && $row['email']==$username)
{
    $name=$row['name'];
    $email=$row['email'];
    $mobile=$row['mobile'];
    
    
   
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
                
                <a href="index.php"><button id="back"><i class="fa fa-reply" aria-hidden="true"></i> Back </button></a>
                    <hr>
                    <div class="row">
                        
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10" style="background-color: white; border: 1px solid #c2c1c1; border-radius: 10px; box-shadow: 0px 0px 3px 3px #d1d0d0;">
                            <br>
                            <h2 style="text-align: center; background-color: #17A2B8; color: white;">Management Profile</h2>
                            <hr>
                            <div class="row">

                                <div class="col-sm-8">
                                    <table class="table table-bordered table-hover">
                                        
                                            <tr>
                                                <th>Name :</th>
                                                <td><?=$name?></td>

                                            </tr>
                                            <tr>
                                                <th>Mobile No :</th>
                                                <td ><?=$mobile?></td>
                                            </tr>
                                            <tr>
                                                <th>Email Id:</th>
                                                <td><?=$email?></td>
                                            </tr>
                                            
                                        
                                    </table>
                                </div>
                                <div class="col-sm-4" style="margin-bottom: 5px; height: 305px;">
                                    <h1 style="font-size: 20px; text-align: center;">Student Photo</h1>
                                    <hr>
                                    <center><img src="images/1.jpg" class=" img-thumbnail"  width="250"  style="max-width: 100%; height: auto;" ></center>
                                    <br>
                                </div>
                                
                            </div>
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

</body>

</html>
<?php } ?>