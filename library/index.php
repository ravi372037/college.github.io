<?php
include "db.php";
//session_start();
include "session.php";
include "class.php";
error_reporting(0);
 if(isset($_SESSION['email']) && isset($_SESSION['password']))

 $password=$_SESSION['password'];
 $username=$_SESSION['email'];
 { 

?>

<?php



$sql = "SELECT * FROM login WHERE email='$username' AND password='$password'";
$result = mysqli_query($con,$sql);

$row=mysqli_fetch_assoc($result);

    $name=$row['name'];
    $email=$row['email'];
  
    
    $tb = "SELECT * FROM library";
    $qu=mysqli_query($con,$tb);
    if($qu)
    {       
            $i=1;
            while($row = mysqli_fetch_assoc($qu))
            {
                $issuedate=$row['issuedate'];
                $sname=$row['sname'];
                $enrollno=$row['enrollno'];
                $branch=$row['branch'];
                $sem=$row['sem'];
                $bookname=$row['bookname'];
                $bookno=$row['bookno'];
                $transdate=date("Y-m-d");

                $firstDate  = new DateTime($issuedate);
                $secondDate = new DateTime(date("Y-m-d"));
                $day = $firstDate->diff($secondDate);
                
                
                
                if($day>15){

                    $inst="INSERT INTO `overdate` (`enrollno`, `name`, `branch`, `sem`, `bookname`, `bookno`, `issueedate`, `transdate`) 
                    VALUES ('$enrollno', '$sname', '$branch', '$sem', '$bookname', '$bookno', '$issuedate', '$transdate')";
                    $qq=mysqli_query($con,$inst);
                    
                    $dlt="DELETE FROM library WHERE issuedate='$issuedate'";
                    $r=mysqli_query($con,$dlt);
                }
                $i++;
            } 
    }       
                        $tb= "SELECT * FROM `overdate`";
                        $result =mysqli_query($con,$tb);
 
                         $i=1;
                          while($row = mysqli_fetch_assoc($result))
                          { $firstDate  = new DateTime($row['transdate']);
                            $secondDate = new DateTime(date("Y-m-d"));
                            $oday = $firstDate->diff($secondDate);
                            $overday= $oday->days;
                            $penalty=$overday*20;
                            $bookno=$row['bookno'];
                            
                            $tbl="UPDATE overdate SET overday='$overday', penalty='$penalty' WHERE bookno='$bookno'";
                            $qr=mysqli_query($con,$tbl);
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
            min-height: 200px; 
            background-color:white;
            box-shadow: 0px 0px 4px 0px #dddcdc;
            border-radius: 2px;
        }

    </style>

</head >

<body style="background-color: #f8f6f6;">


    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar" style="background-color: #0b660b; height: auto; box-shadow: 5px 0px 5px 0px #999999;">
            <div class="sidebar-header" style="background-color: #0b660b; ">
                <h1 style="font-size: 25px;">
                    <a>Welcome</a>
                    <a><?=$name?></a>
                </h1>
                <span><?=$name[0]?></span>
            </div>
            
            <ul class="list-unstyled components">
                <li class="active">
                    <a  style="background-color: #0b660b;">
                        <i class="fas fa-th-large"></i> Dashboard
                    </a>
                </li>
                
                <li>
                    <a  href="manage.php" >
                    <i class="fa fa-cogs" aria-hidden="true"></i></i> Management

                    </a>

                </li>
                <li>
                    <a  href="issuebook.php" >
                        <i class="fas fa-book"></i> Issue Book

                    </a>

                </li>

                <li>
                    <a href="returnbook.php" >
                        <i class="fas fa-book"></i> Return Book

                    </a>

                </li>
                <li>
                    <a href="overdate.php" >
                        <i class="fas fa-ban"></i> Blacklist

                    </a>

                </li>

                <li>
                    <a href="issuebookrecord.php" >
                        <i class="fas fa-pie-chart"></i> Issue Book Detail 

                    </a>

                </li>
                <li>
                    <a href="retrunrecord.php" >
                        <i class="fas fa-pie-chart"></i> Return Book Detail 

                    </a>

                </li>
                <li>
                    <a href="overdaterecord.php" >
                        <i class="fas fa-pie-chart"></i> Over Date Detail 

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
            <nav class="navbar navbar-default mb-xl-5 mb-4" style="background-color: #0b660b;"> 
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
                                        <img src="images/n.jpg" class="img-fluid mb-3" alt="Responsive image">
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
                <hr color="green">
                <marquee scrollamount="12" style="font-size:30px; color: green;" behavior="alternate">Library Management System</marquee>
                <hr color="green">
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-4 D">
                        <div class="row">
                            <table class="table table-hover ">
                            
                           
                                <tr style="background-color: #2fff4b">
                                    <th style="color: white; text-align: center;" colspan="4">Computer Sceince Engineering</th>
                                    
                                </tr>
                                <tr>
                                    <th>1st Sem.</th>
                                    <td>30</td>
                                    <th>2nd Sem.</th>
                                    <td>20</td>
                                </tr>
                                <tr>
                                    <th>3rd Year</th>
                                    <td>10</td>
                                    <th>4th Sem.</th>
                                    <td>20</td>
                                </tr>
                                <tr>
                                    <th>5th Year</th>
                                    <td><?=$rn?></td>
                                    <th>6th Sem.</th>
                                    <td>20</td>
                                </tr>
                                <tr>
                                    <th colspan="2">Total Student = </th>
                                    <th colspan="2">30</th>
                                </tr>
                            </table>
                        </div>    
                        
                    </div>
                    
                    <div class="col-sm-1"></div>
                    <div class="col-sm-4 D">
                        <div class="row">
                            <table class="table table-hover ">
                                <tr style="background-color: #2fff4b">
                                    <th style="color: white; text-align: center;" colspan="2">Civil Engineering</th>
                                    
                                </tr>
                                <tr>
                                    <th>1st Year</th>
                                    <td>30</td>
                                </tr>
                                <tr>
                                    <th>2nd Year</th>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <th>3rd Year</th>
                                    <td>30</td>
                                </tr>
                                <tr>
                                    <th>Total Student</th>
                                    <td>30</td>
                                </tr>
                            </table>
                        </div>    

                    </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-4 D">
                    <div class="row">
                        <table class="table table-hover ">
                            <tr style="background-color: #2fff4b">
                                <th style="color: white; text-align: center;" colspan="2">Textile Technology</th>
                                
                            </tr>
                            <tr>
                                <th>1st Year</th>
                                <td>30</td>
                            </tr>
                            <tr>
                                <th>2nd Year</th>
                                <td>10</td>
                            </tr>
                            <tr>
                                <th>3rd Year</th>
                                <td>30</td>
                            </tr>
                            <tr>
                                <th>Total Student</th>
                                <td>30</td>
                            </tr>
                        </table>
                    </div>    
                    
                </div>
                
                <div class="col-sm-1"></div>
                <div class="col-sm-4 D">
                        <div class="row">
                            <table class="table table-hover ">
                                <tr style="background-color: #2fff4b">
                                    <th style="color: white; text-align: center;" colspan="2">Total Student</th>
                                    
                                </tr>
                                <tr>
                                    <th>Computer Sceince Engineering</th>
                                    <td>30</td>
                                </tr>
                                <tr>
                                    <th>Cvil Engineering</th>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <th>Textile Technology</th>
                                    <td>30</td>
                                </tr>
                                <tr>
                                    <th>Total Student</th>
                                    <td>30</td>
                                </tr>
                            </table>
                        </div>    
                        
                    </div>
                

        </div>

            <!-- Copyright -->
            <div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="background-color: #0b660b">
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