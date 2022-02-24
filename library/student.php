
<!DOCTYPE html>
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


</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar" style="background-color: #CC292D; height: auto;">
            <div class="sidebar-header" style="background-color: #CC292D; ">
                <h1>
                    <a href="index.html">Student</a>
                </h1>
                <span>P</span>
            </div>
            
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="index.html" style="background-color: #CC292D;">
                        <i class="fas fa-th-large"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-users"></i> What's new today?

                    </a>

                </li>

                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-user"></i> Course Detail

                    </a>

                </li>

                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-comments"></i> Discussion Board 

                    </a>

                </li>

                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-book"></i> fee Detail

                    </a>

                </li>


                <li>
                    <a href="charts.html">
                        <i class="fa fa-inr"></i>view Result
                    </a>
                </li>


                <li>
                    <a href="grids.html">
                        <i class="fas fa-book"></i> Admission Detail
                    </a>
                </li>

                <li> 
                    <a href="grids.html">
                        <i class="fas fa-book"></i> Modal Paper
                    </a>
                </li>
                <li>
                    <a href="grids.html">
                        <i class="fas fa-sign-out-alt"></i> Study Material
                    </a>
                </li>
               
                

            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
            <nav class="navbar navbar-default mb-xl-5 mb-4" style="background-color: #CC292D;"> 
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <h1 style="color: white;">Student Dashboard</h1>
                    <ul class="top-icons-agileits-w3layouts float-right">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-user" style="color: white;"></i>
                            </a>
                            <div class="dropdown-menu drop-3">
                                <div class="profile d-flex mr-o">
                                    <div class="profile-l align-self-center">
                                        <img src="images/profile.jpg" class="img-fluid mb-3" alt="Responsive image">
                                    </div>
                                    <div class="profile-r align-self-center">
                                        <h3 class="sub-title-w3-agileits">Will Smith</h3>
                                        <a href="mailto:info@example.com">info@example.com</a>
                                    </div>
                                </div>
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-user mr-3"></i>View Profile</h4>
                                </a>
    
                                <a href="#" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-envelope mr-3"></i>Edit Profile</h4>
                                </a>
                                <a href="changepassword.jsp" class="dropdown-item mt-3">
                                    <h4>
                                        <i class="far fa-question-circle mr-3"></i>Change Password</h4>
                                </a>
                            
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="index.jsp">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!--// top-bar -->





            <div class="container-fluid">
                <div class="row">

                    <div class="outer-w3-agile col-xl ml-xl-3 mt-xl-0 mt-3">
                        <div class="stat-grid p-3 d-flex align-items-center justify-content-between " style="background-color: #FF5733;">
                            <div class="s-l">
                                <h5>Syllabus</h5>

                            </div>
                            <div class="s-r">
                                <h6>
                                    <i class="far fa-comments"></i>
                                </h6>
                            </div>
                        </div>
                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between" style="background-color: #11505e;">
                            <div class="s-l">
                                <h5>Feedback</h5>

                            </div>
                            <div class="s-r">
                                <h6>
                                    <i class="far fa-comment-alt"></i>
                                </h6>
                            </div>
                        </div>
                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between " style="background-color: #921c53;">
                            <div class="s-l">
                                <h5>Library Detail</h5>

                            </div>
                            <div class="s-r">
                                <h6>
                                    <i class="far fa-envelope"></i>
                                </h6>
                            </div>
                        </div>
                        
                    </div>




                    <!-- Stats -->
                    <div class="outer-w3-agile col-xl">
                        <center>
                            <h1><u>Examination schedules</u></h1>


                            <marquee width="90%" direction="up" height="250px" style="margin-top: 20px;">

                                This is a sample scrolling text that has scrolls in the upper direction. <br>
                                <br> This is a sample scrolling text that has scrolls in the upper direction. <br><br> This is a sample scrolling text that has scrolls in the upper direction.
                            </marquee>

                        </center>

                    </div>
                    <!--// Stats -->




                    <!-- Pie-chart -->

                </div>

            </div>

            <!-- Copyright -->
            <div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="background-color: #CC292D;">
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
