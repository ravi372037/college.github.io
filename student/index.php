
<?php
include "db.php";
error_reporting(0);
session_start();
 if(isset($_SESSION['email']) && isset($_SESSION['epassword']))
 { ?>

<?php
        $password=$_SESSION['epassword'];
        $username=$_SESSION['email'];

      $sql = "SELECT * FROM student WHERE email='$username' AND epassword='$password'";
      $result = mysqli_query($con,$sql);
      
        $row=mysqli_fetch_assoc($result);
       
            $name=$row['sname'];
            $email=$row['email'];
            $sem=$row['sem'];
            $branch=$row['branch'];
            $_SESSION['enrollno']=$row['enrollno'];
            $image="upload/".$row['image'];
           
       
     
      if($branch=== "Computer Science Engineering")
      {
      if($sem === "1st Semester")
      {
          $sub1 ="Communication Skill-I";
          $sub2 ="Applied Mathematics-I";
          $sub3 ="Applied Physics-I ";
          $sub4 ="Applied Chemistry";
          $sub5 ="Fundamentals of Computer and Information Technology";
          $sub6 ="Technical Drawing";
          $sub7 ="Workshop Practice";
      }
      elseif($sem === "2nd Semester")
      {
          $sub1 ="Applied Mathematics-II";
          $sub2 ="Applied Physics-II";
          $sub3 ="Basics of Electrical and Electronics Engineering ";
          $sub4 ="Multimedia & Animation";
          $sub5 ="Concept of Programming Using C";
          $sub6 ="Office Automation Tools ";
          $sub7 ="";
      }
      elseif($sem === "3rd Semester")
      {
          $sub1 ="Applied Mathematics-III";
          $sub2 ="Internet and Web Technology ";
          $sub3 ="Environmental Studies";
          $sub4 ="Data Communication and Computer Networks ";
          $sub5 ="Data Structure Using C";
          $sub6 ="Digital Electronics";
          $sub7 ="";
      }
      elseif($sem === "4th Semester")
      {
          $sub1 ="Communication Skill-II";
          $sub2 ="Database Management System ";
          $sub3 ="Object Oriented Programming Using Java ";
          $sub4 ="Operating Systems";
          $sub5 ="E-Commerce and Digital Marketing";
          $sub6 ="Energy Conservation";
          $sub7 ="Universal Human Values ";
      }
      elseif($sem === "5th Semester")
      {
          $sub1 ="Software Engineering";
          $sub2 ="Web Development using PHP";
          $sub3 ="Computer Programming using Python";
          $sub4 ="Computer Architecture and Hardware Maintenance";
          $sub5 ="Internet of Things";
          $sub6 ="Minor Project Work";
          $sub7 ="";
      }
      elseif($sem === "6th Semester")
      {
          $sub1 ="Development of Android Applications ";
          $sub2 ="Cloud Computing";
          $sub3 ="Industrial Management and Entrepreneurship Development";
          $sub4 ="Elective";
          $sub5 ="Major Project Work";
          $sub6 ="";
          $sub7 ="";
      }
    }
    if($branch=== "Civil Engineering")
    {
    if($sem === "1st Semester")
    {
        $sub1 ="Communication Skill-I";
        $sub2 ="Applied Mathematics-I";
        $sub3 ="Applied Physics-I ";
        $sub4 ="Applied Chemistry";
        $sub5 ="Engineering Drawing-I";
        $sub6 ="Construction Materials ";
        $sub7 ="General Workshop Practice - I";
    }
    elseif($sem === "2nd Semester")
    {
        $sub1 ="Applied Mathematics-II";
        $sub2 ="Computer Aided Drawing";
        $sub3 ="Applied Mechanics";
        $sub4 ="Basics of Mechanical and Electrical Engg.";
        $sub5 ="Basics of Information Technology";
        $sub6 ="General Workshop Practice -II ";
        $sub7 ="";
    }
    elseif($sem === "3rd Semester")
    {
        $sub1 ="Hydraulics and Hydraulic Machines";
        $sub2 ="Concrete Technology";
        $sub3 ="Environmental Studies";
        $sub4 ="Structural Mechanics";
        $sub5 ="Building Construction";
        $sub6 ="";
        $sub7 ="";
    }
    elseif($sem === "4th Semester")
    {
        $sub1 ="Communication Skill-II ";
        $sub2 ="Highway Engineering ";
        $sub3 ="Irrigation Engineering";
        $sub4 ="Surveying - I ";
        $sub5 ="Reinforced Cement Concrete Structures (RCC Structures) ";
        $sub6 ="RCC Drawing";
        $sub7 ="";
    }
    elseif($sem === "5th Semester")
    {
        $sub1 ="Water and Waste Water Engineering ";
        $sub2 ="Railways, Bridges and Tunnels";
        $sub3 ="Earthquake Engineering";
        $sub4 ="Soil Mechanics and Foundation Engineering ";
        $sub5 ="Surveying-II ";
        $sub6 ="Waste Water and Irrigation Engineering Drawing ";
        $sub7 ="Universal Human Values ";
    }
    elseif($sem === "6th Semester")
    {
        $sub1 ="Quantity Surveying and Valuation ";
        $sub2 ="Construction Management, Accounts and Entrepreneurship Development";
        $sub3 ="Steel Structure Drawing ";
        $sub4 ="Software Application in Civil Engineering";
        $sub5 ="Elective";
        $sub6 ="Project Work";
        $sub7 ="";
    }
  }
  if($branch=== "Computer Science Engineering")
      {
      if($sem === "1st Semester")
      {
          $sub1 ="Communication Skill-I";
          $sub2 ="Applied Mathematics-I";
          $sub3 ="Applied Physics-I ";
          $sub4 ="Applied Chemistry";
          $sub5 ="Fundamentals of Computer and Information Technology";
          $sub6 ="Technical Drawing";
          $sub7 ="Workshop Practice";
      }
      elseif($sem === "2nd Semester")
      {
          $sub1 ="Applied Mathematics-II";
          $sub2 ="Applied Physics-II";
          $sub3 ="Basics of Electrical and Electronics Engineering ";
          $sub4 ="Multimedia & Animation";
          $sub5 ="Concept of Programming Using C";
          $sub6 ="Office Automation Tools ";
          $sub7 ="";
      }
      elseif($sem === "3rd Semester")
      {
          $sub1 ="Applied Mathematics-III";
          $sub2 ="Internet and Web Technology ";
          $sub3 ="Environmental Studies";
          $sub4 ="Data Communication and Computer Networks ";
          $sub5 ="Data Structure Using C";
          $sub6 ="Digital Electronics";
          $sub7 ="";
      }
      elseif($sem === "4th Semester")
      {
          $sub1 ="Communication Skill-II";
          $sub2 ="Database Management System ";
          $sub3 ="Object Oriented Programming Using Java ";
          $sub4 ="Operating Systems";
          $sub5 ="E-Commerce and Digital Marketing";
          $sub6 ="Energy Conservation";
          $sub7 ="Universal Human Values ";
      }
      elseif($sem === "5th Semester")
      {
          $sub1 ="Software Engineering";
          $sub2 ="Web Development using PHP";
          $sub3 ="Computer Programming using Python";
          $sub4 ="Computer Architecture and Hardware Maintenance";
          $sub5 ="Internet of Things";
          $sub6 ="Minor Project Work";
          $sub7 ="";
      }
      elseif($sem === "6th Semester")
      {
          $sub1 ="Development of Android Applications ";
          $sub2 ="Cloud Computing";
          $sub3 ="Industrial Management and Entrepreneurship Development";
          $sub4 ="Elective";
          $sub5 ="Major Project Work";
          $sub6 ="";
          $sub7 ="";
      }
    }
?>

<html lang="en">

<head>
    <title>Admin Panel</title>

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
    <style>
        .D
        {
            background-color:white;
            box-shadow: 0px 0px 4px 0px #dddcdc;
            border-radius: 2px;
        }

    </style>

</head>

<body style="background-color: #f8f6f6;">

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar" style="background-color: #178fdf; height: auto; box-shadow: 5px 0px 5px 0px #999999;">
            <div class="sidebar-header" style="background-color: #178fdf; ">
                <h1 style="font-size: 25px;">
                    <a>Welcome</a>
                    <br>    
                    <a style="font-size: 22px;"><?=$name?></a>
                </h1>
                <span><?=$name[0]?></span>
            </div>
            
            <ul class="list-unstyled components">
                <li class="active">
                    <a  style="background-color: #178fdf;">
                        <i class="fas fa-th-large"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a  href="#" >
                        <i class="fas fa-book"></i> Study Material

                    </a>

                </li>


                <li>
                    <a href="library.php" >
                        <i class="fa fa-building-o"></i> Library Detail

                    </a>

                </li>
               

                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-comments"></i> Discussion Board 

                    </a>

                </li>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
            <nav class="navbar navbar-default mb-xl-5 mb-4" style="background-color: #178fdf;"> 
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <h3 style="color: white;">GOVT. POLYTECHNIC CHANGIPUR NOORPUR (BIJNOR)</h3>
                    <ul class="top-icons-agileits-w3layouts float-right">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-user" style="color: white;"></i>
                            </a>
                            <div class="dropdown-menu drop-3">
                                <div class="profile d-flex mr-o">
                                    <div class="profile-l align-self-center">
                                        <img src="<?=$image?>" class="img-fluid mb-3" alt="Responsive image">
                                    </div>
                                    <div class="profile-r align-self-center">
                                        <h3 class="sub-title-w3-agileits"><?=$name?></h3>
                                        <a href="mailto:info@example.com"><?=$email?></a>
                                    </div>
                                </div>
                                <a href="profile.php" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-user mr-3"></i>View Profile</h4>
                                </a>
    
                                <a href="editprofile.php" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-envelope mr-3"></i>Edit Profile</h4>
                                </a>
                                <a href="changepass.php" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-question-circle mr-3"></i>Change Password</h4>
                                </a>
                            
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <!--// top-bar -->

            <div class="container-fluid">
               <hr color="#178fdf">
                <div class="row">
                    <div class="col-sm-6 D">
                        <div class="row">
                            <table class="table table-hover table-bordered text-center">
                                <tr style=" background-color: #3ab0ff;">
                                 <th style="color: white;">
                                     Lecture
                                 </th>
                                 <th style="color: white;">
                                    Class Attand
                                 </th>
                                 <th style="color: white;">
                                     Total Class
                                 </th>
                                 <th style="color: white;">
                                     Perchantage %
                                 </th>
                                </tr>
                                <tr>
                                <td>
                                <?=$sub1?>
                                </td>
                                <td>
                                    120
                                </td>
                                <td>
                                    150
                                </td>
                                <td>
                                    80%
                                </td>
                                </tr>
                                <tr>
                                    <td>
                                    <?=$sub2?>
                                    </td>
                                    <td>
                                        120
                                    </td>
                                    <td>
                                        150
                                    </td>
                                    <td>
                                        80%
                                    </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <?=$sub3?>
                                        </td>
                                        <td>
                                            120
                                        </td>
                                        <td>
                                            150
                                        </td>
                                        <td>
                                            80%
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <?=$sub4?>
                                            </td>
                                            <td>
                                                120
                                            </td>
                                            <td>
                                                150
                                            </td>
                                            <td>
                                                80%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <?=$sub5?>
                                            </td>
                                            <td>
                                                120
                                            </td>
                                            <td>
                                                150
                                            </td>
                                            <td>
                                                80%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <?=$sub6?>
                                            </td>
                                            <td>
                                                120
                                            </td>
                                            <td>
                                                150
                                            </td>
                                            <td>
                                                80%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <?=$sub7?>
                                            </td>
                                            <td>
                                                
                                            </td>
                                            <td>
                                                
                                            </td>
                                            <td>
                                                
                                            </td>
                                        </tr>
                             </table>
                        </div>
                    </div>
                    
                    <div class="col-sm-1"></div>
                    <div class="col-sm-5 D">
                        <div class="row" >
                            <div class="col-sm-12" style="background-color: #3ab0ff; min-height: 50px; color: white; text-align: center;">
                                <h2> Letest Update :-</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <marquee direction="up" style="min-height: 300px;"> 
                                    <p>GOVT POLYTECHNIC CHANGIPUR NOORPUR BIJNOR</p>
                                    <br>
                                    <p>GOVT POLYTECHNIC CHANGIPUR NOORPUR BIJNOR</p>
                                    <br>
                                    <p>GOVT POLYTECHNIC CHANGIPUR NOORPUR BIJNOR</p>
                                    <br>
                                    
                                </marquee>
                            </div>
                            
                        </div>
                    </div>
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
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
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