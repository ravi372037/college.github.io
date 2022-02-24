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
   
    
    
   
} 
}
            
?>
 
<html lang="en">

<head>
<style>
        #btn
        {
            height: 40px;
            background-color: red;
            border: 2px solid #861315;
            color: white;
            border-radius: 5px 5px 5px 5px;
            font-size: 20px;
            
        }
        #btn:hover
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
        <nav id="sidebar" style="background-color: #0b660b; height: auto; box-shadow: 5px 0px 5px 0px #999999;">
            <div class="sidebar-header" style="background-color: #0b660b; ">
                <h1 style="font-size: 25px;">
                    <a><?=$name?></a>
                </h1>
                <span>N</span>
            </div>
            
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="index.php" style="background-color: #0b660b;">
                        <i class="fas fa-th-large"></i> Dashboard
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
                    <h1 style="color: white;"">Return Book</h1>
                    <ul class="top-icons-agileits-w3layouts float-right"></ul>
                </div>
            </nav>
            <!--// top-bar -->

            <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
            $enrollno=$_POST['enrollno'];

            $sql = "SELECT * FROM student WHERE enrollno='$enrollno'";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result) === 1)
            {
                $row=mysqli_fetch_assoc($result);
                if($row['enrollno'] === $enrollno)
                    {
                    $_SESSION['enrollno']=$row['enrollno'];
                    
                    header("Location: return2.php");
                    } 
            }
            else
            {
                header("Location: returnbook.php?error=Record not found");
            }
            }

            
            ?>
            


            <div class="container-fluid">
                <form method="POST">
                
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-4">
                    <input placeholder="Enter Enrollment No | Student Name" class="form-control" list="browsers" name="enrollno" id="browser">
  <datalist id="browsers">
      <?php
        $tb="SELECT * FROM `student`";
        $qu=mysqli_query($con,$tb);
        $i=1;
        while($r=mysqli_fetch_assoc($qu))
        { ?>
        <option value="<?=$r['enrollno']?>" >
        <?=$r['sname']?> [<?=$r['branch']?> <?=$r['sem']?>]

    
        <?php
        $i++;} 
        ?>
    
    </datalist>
                </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-4">
                        <?php
                    if(isset($_GET['error']))
                            { ?>
                            <div class="alert alert-danger" role="alert">
                                <?=$_GET['error']?>
                            </div>
                            <?php } ?>
                       <button id="btn" type="submit">Return Book</button>
                    </div>
                </div>
                
                </form>
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
<script>
    var date = new Date();
    var year = date.getFullYear();
</script>
</html>
<?php
}?>