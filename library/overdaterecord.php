
<html lang="en">

<head>
    <style>
        #print
        {
            height: 40px;
            width: 110px;
            background-color: #28A745;
            border: 1px solid green;
            border-radius: 5px 5px 5px 5px;
            font-size: 20px;
            color: white;
          
            
        }
        #print:hover
        {
            cursor: pointer;
            color: #28A745;
            box-shadow: 0px 0px 5px 5px #22e643;
            border: 1px solid green;
            background-color: white;
        }
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
          background-color: #e93737; 
          color: white;
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

    <link href="css/datatable.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
            <nav class="navbar navbar-default mb-xl-5 mb-4" style="background-color: #0b660b;"> 
                <div class="container-fluid">

                    <div class="navbar-header">
                        
                    </div>
                    <h1 style="color: white; ">Issue Book Detail</h1>
                    <ul class="top-icons-agileits-w3layouts float-right"></ul>
                </div>
            </nav>
            <!--// top-bar -->





            <div class="container-fluid">
              
                

              <a href="index.php"><button id="back"><i class="fa fa-reply" aria-hidden="true"></i> Back </button></a>
              <br>
              <br>
             
                <u><h2>Search Details :-</h2></u>
                <hr>
                <form method="POST">
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-4">
                      <select class="form-control" name="branch">
                      <option>-Select Branch-</option>
                    <option value="Computer Science Engineering">1. Computer Science Engineering</option>
                    <option value="Civil Engineering">2. Civil Engineering</option>
                    <option value="Textile Technology">3. Textile Technology</option>
                        
                      </select>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-4">
                       <select class="form-control" name="sem">
                       <option value="0">-Select Semester-</option>
                       <option value="1st Semester">1st Semester</option>
                    <option value="2nd Semester">2nd Semester</option>
                    <option value="3rd Semester">3rd Semester</option>
                    <option value="4th Semester">4th Semester</option>
                    <option value="5th Semester">5th Semester</option>
                    <option value="6th Semester">6th Semester</option>
                       </select>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-sm-5"></div>
                    <div class="col-sm-2">
                        <button id="print" type="submit"> <i class="fa fa-search" aria-hidden="true"></i> Search </button>
                    </div>
                </div>
                </form>
                
              <hr>
              <div class="row">
                
                <div class="col-sm-5">
                
                  <br>
                </div>
                <div class="col-md-5">
                <h1><u><?=date("Y")?></u></h1>
                <br>
                </div>
               
                <div class="col-sm-1"><a  target="blank"><button  id="print"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a></div>
              </div>
             <br>
                <div class="col-sm-12">
        <?php
            include "db.php";

 
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $branch=$_POST['branch'];
        $sem=$_POST['sem'];

        $tb= "SELECT * FROM `overdaterecord` WHERE branch='$branch' AND sem='$sem'";
        $result =mysqli_query($con,$tb);
        ?>
        
    
              <?php
                if(mysqli_num_rows($result)>0)
                { ?>


                    <table class="table table-bordered table-hover" id="example">
                       <thead>
                       <tr>
                            <th id="t">Sr.No.</th>
                            <th id="t">Student Id</th>
                            <th id="t">Name</th>
                            <th id="t">Branch</th>
                            <th id="t">Semester</th>
                            <th id="t">Book Name</th>
                            <th id="t">Book No</th>
                            <th id="t">Isuue Date</th>
                            <th id="t">Return Date</th>
                            <th id="t">Overday</th>
                            <th id="t">Penalty</th>
                          </tr>
                          
                        </thead>
                        <tbody>
                          <?php
                          $i=1;
                          while($row = mysqli_fetch_assoc($result))
                          { 
                            $Date = date("d-m-Y", strtotime($row['issuedate']));
                              ?>
                         
                          <tr>
                            <th><?=$i?></th>
                            <td><?=$row['enrollno']?></td>
                            <td><?=$row['name']?></td>
                            <td><?=$row['branch']?></td>
                            <td><?=$row['sem']?></td>
                            <td><?=$row['bookname']?></td>
                            <td><?=$row['bookno']?></td>
                            <td><?=$Date?></td>
                            <td><?=$row['returndate']?></td>
                            <td><?=$row['overday']?></td>
                            <td><?=$row['penalty']?> <i class="fas fa-rupee-sign"></td>
                            
                          </tr>
                          <?php $i++; } ?>
                        </tbody>
                      </table>
                      <?php } 
                       else
                       {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error !</strong> Not Record Found.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>';
                       }
                      ?>

                      <?php } ?>
                      
                      
                    

                      
                </div>
            </div>

            <!-- Copyright -->
            <div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center" style="background-color: #0b660b;">
                <p style="color: white;">© 2021  | Design by
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
    
        <script src="js/datatable.js"></script>
        <script >
            $(document).ready(function() {
            $('#example').DataTable();
            } );
        </script>

    <!-- Js for bootstrap working-->
    <script src="js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->

</body>

</html>
