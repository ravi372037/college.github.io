<?php
session_start();
include "db.php";

if(isset($_SESSION['enrollno']))

 
 { ?>
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
        #t
        {
            background-color: #17A2B8; color: white;
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
                    <h1 style="color: white;">Libray Deatail</h1>
                    <ul class="top-icons-agileits-w3layouts float-right"></ul>
                </div>
            </nav>
            <!--// top-bar -->

            <div class="container-fluid">
                
                <a href="index.php"><button id="back"><i class="fa fa-reply" aria-hidden="true"></i> Back </button></a>
                    <hr>
                    
                    <br>
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
                                    <th id="t">Sr.No.</th>
                                    <th id="t">Book Name</th>
                                    <th id="t">Book No</th>
                                    <th id="t">Issue Date</th>
                                    <th id="t">Valaditiy</th>
                                    
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
                                    
                                </tr>
                                <?php $i++; } ?>
                                
                            </table>
                            <?php } ?>
                        </div>
                        <div class="col-sm-1"></div>
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
<?php } ?>