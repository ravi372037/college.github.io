<html>
  <head>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/fontawesome.css" />
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/hover-min.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/counterup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/main.js"></script>
  </head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12" style="min-height: 25px; border-bottom: 2px dotted #CC292D;">
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2 ic"><i class="fa fa-map-marker "></i><span> example@mail.com</span></div>
      
            <div class="col-md-2 ic"><i class="fa fa-phone fa-spin" ></i><span> 7351000033</span></div>
              <div class="col-md-7">
                <marquee behavior="alternate" ><span id="onmgmt" >Online College Management System</span></marquee>
              </div>
             
          </div>
      </div>
    </div>
    <!--Nav bar-->
    <div class="row">
      <div class="col-md-2 nav1" data-aos="fade-right">
        <center>
          <img src="img/GP1.png" class="img img-responsive hvr-buzz" width="150" style="margin: 2px;" />
        </center>
      </div>
      <div class="col-md-10 nav2">
        <div data-aos="zoom-in">
          <center>
            <h2 id="tit1"> GOVERNMENT POLYTECHNIC CHANGIPUR NOORUR(BIJNOR)</h2>
            <h2 id="tit2">राजकीय पॉलिटेक्निक चांगीपुर नूरपुर(बिजनौर)</h2>
          </center>
        </div>
      </div>
    </div>
    <!--Menu bar-->
    <div class="row">

      <nav class="navbar navbar-default" style="background: #CC292D;">
        <div class="container-fluid" style="min-height: 50px;">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <a class="navbar-brand hvr-float hvr-icon-pulse-grow" id="h" href="index.php">Home</a>
          </div>
          

        </div><!-- /.container-fluid -->
      </nav>
      <?php
       include "db.php";
       if($_SERVER['REQUEST_METHOD']=='POST')
       {
        $sname =trim($_POST['sname']);
        $enrollno =trim($_POST['enrollno']);
        $fname =trim($_POST['fname']);
        $mname =trim($_POST['mname']);
        $gender =$_POST['gender'];
        $dob =$_POST['dob'];
        $branch =$_POST['branch'];
        $sem =$_POST['sem'];
        $email =trim($_POST['email']);
        $mobile =trim($_POST['mobile']);
        $pmobile =trim($_POST['pmobile']);
        
        $address =$_POST['address'];
        $epassword =md5(trim($_POST['epassword']));
        $cpassword =md5(trim($_POST['cpassword']));
        $role="student";

        $filename =$_FILES["image"]["name"];
        $tempname =$_FILES["image"]["tmp_name"];
        $folder = "student/upload/".$filename;
        move_uploaded_file($tempname,$folder);

        if($cpassword!=$epassword)
        {
            
            header("Location:register.php?error=Conform password not match.");
        }
        else
        {
          $q ="select * from student where enrollno = '$enrollno'";
          $res = mysqli_query($con, $q);
          $n=mysqli_num_rows($res);

          
          $q2 ="select * from student where email = '$email'";
          $res2 = mysqli_query($con, $q2);
          $n2=mysqli_num_rows($res2);
          
          
          
          
          if($n == 1)
          {
            echo '<div class="alert alert-danger" role=" alert">
            Enrollment No :- '.$enrollno.' is already registered.
          </div>';
          }
          elseif($n2==1)
          {
            echo '<div class="alert alert-danger" role=" alert">
            Email Id :- '.$email.' is already registered.
          </div>';
          }
          
          else
          {
            $sql = "INSERT INTO `student` (`role`,`sname`, `enrollno`, `fname`, `mname`, `gender`, `dob`, `branch`, `sem`, `email`, `mobile`, `pmobile`, `image`, `address`, `epassword`) VALUES ('$role','$sname', '$enrollno', '$fname', '$mname', '$gender', '$dob', '$branch', '$sem', '$email', '$mobile', '$pmobile', '$filename', '$address', '$epassword')"; 
            
            $result = mysqli_query($con, $sql);
           
            
            if($result)
            {
              echo '<div class="alert alert-success" role="alert">
                      Your Registration Completed Successful. Your Login Id = '.$email.'</div>';
            }
            else
            {
              echo '<div class="alert alert-warning" role="alert">
                      Your Registration NOt Completed .
                    </div>';
            }
          } 
        }

       }

      ?>
        



    
         
      <?php
                            if(isset($_GET['error']))
                            { ?>
                            <div class="alert alert-danger" role="alert">
                                <?=$_GET['error']?>
                            </div>
                            <?php } ?>
    </div>
    <!--Register form section-->
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10" style="height: auto; box-shadow: 0px 0px 20px 0px gainsboro; border-radius: 0px 0px 5px 5px;">
        <div class="row">
          <div class="col-md-12" style="background-color: #CC292D; min-height: 30px;  text-align: center; color: white; text-shadow:  3px 2px 3px gray;"><h1>Registration Form</h1></div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <span style="color: red;">Note:-</span> It is mandatory to enter the asterisk (<span
              style="color: red;">*</span>) box in the application form.
            <br>
            <br>
            <form  method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <label>1. Student Name <span style="color: red;">*</span></label>
                  <input name="sname" type="text" class="form-control" placeholder="Enter Student Name" required>
                </div>
                <div class="col-md-6">
                  <label>2. Enrollment No <span style="color: red;">*</span></label>
                  <input name="enrollno" type="text" class="form-control" placeholder="Enter Enrollment No" required>
                </div>
              </div>
              <br>

              <div class="row">
                <div class="col-md-6">
                  <label>3. Father's Name <span style="color: red;">*</span></label>
                  <input name="fname" type="text" class="form-control" placeholder="Enter Father's Name" required>
                </div>
                <div class="col-md-6">
                  <label>4. Mother's Name <span style="color: red;">*</span></label>
                  <input name="mname" type="text" class="form-control" placeholder="Enter Mother's Name" required>
                </div>
              </div>

              <br>
              <div class="row">
                <div class="col-md-6">
                  <label>5. Gender <span style="color: red;">*</span></label>
                  <br>
                  <input name="gender" value="Male" style="height: 20px; width: 20px;" type="radio" required> <i style="font-size: 20px;" class="fa fa-male" aria-hidden="true"></i> Male
                  <input name="gender" value="Female" style="height: 20px; width: 20px; margin-left: 30px;" type="radio"> <i style="font-size: 20px;" class="fa fa-female" aria-hidden="true"></i> Female
                </div>
                <div class="col-md-6">
                  <label>6. Date of Birth <span style="color: red;">*</span></label>
                  <input name="dob" type="date" class="form-control" required>
                </div>
              </div>

              <br>



              <div class="row">
                <div class="col-md-6">
                  <label>7. Select Branch <span style="color: red;">*</span></label>
                  <select class="form-control" name="branch" required>
                    <option>-Select Branch-</option>
                    <option value="Computer Science Engineering">1. Computer Science Engineering</option>
                    <option value="Civil Engineering">2. Civil Engineering</option>
                    <option value="Textile Technology">3. Textile Technology</option>
                    
                  </select>
                </div>

                <div class="col-md-6">
                  <label>8. Select Semester <span style="color: red;">*</span></label>
                  <select class="form-control" name="sem" required>
                    <option >-Select Semester-</option>
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
        
              <div class="row">
                <div class="col-md-4">
                  <label>9. Email id <span style="color: red;">*</span></label>
                  <input name="email" type="email" class="form-control" placeholder="Enter Email" required>
                </div>
                <div class="col-md-4">
                  <label>10. Mobile No <span style="color: red;">*</span></label>
                  <input name="mobile" type="number" maxlength="10" class="form-control" placeholder="Enter Mobile No" required>
                </div>
                <div class="col-md-4">
                  <label>11. Parent's Mobile No <span style="color: red;">*</span></label>
                  <input name="pmobile" type="number" maxlength="10" class="form-control" placeholder="Enter Mobile No" required> 
                </div>
              </div>

              <br>


              <div class="row">
                <div class="col-md-6">
                  <label>12. Profile Image <span style="color: red;">*</span></label>
                  <input name="image" type="file" class="form-control"  required>
                </div>
                <div class="col-md-6">
                  <label>13. Address <span style="color: red;">*</span></label>
                  <br>
                  <textarea name="address" class="form-control" style="resize:none;"></textarea>
                </div>
              </div>
              <br>


              <div class="row">
                <div class="col-md-6">
                  <label>14. Enter Password <span style="color: red;">*</span></label>
                  <input name="epassword" type="password" class="form-control" placeholder="Enter Password" required>
                </div>
                <div class="col-md-6">
                  <label>15. Confirm Password <span style="color: red;">*</span></label>
                  <input name="cpassword" type="password" class="form-control" placeholder="Confirm Password" required>
                </div>
              </div>
              <br>
              <input type="checkbox" required> I accept. I fill all deatils are true.
              <center>
                <tr>
                  <td>
                    <button href="#" type="submit" class="btn btn-success"><span
                        class="glyphicon glyphicon-check"></span> Register</button>
                  </td>
                  <td>
                    <button href="#" type="reset" class="btn  btn-danger"><span
                        class="glyphicon glyphicon-remove"></span> Clear</button>
                  </td>
                </tr>
              </center>
            </form>
          </div>
        </div>
       
    </div>
    <br>
    <!--footer section-->
  </div>
  <br>
  <div class="row">
    <div class="col-md-12 footer">
     <div class="row">
       <div class="col-md-1"></div>
       <div class="col-md-3">
         <h3 style="color: white;">About Us</h3>
         <hr>
         <div>vdfjkkjdkjvnxnxn dvdkbxc nx nxj bh u9sdxk  nxl dv xlk diuvvsmn sjxb piu xn xnsijcnsiubvx,c vcjk niudhvdiu n</div>
       </div>
       <div class="col-md-1"></div>
       <div class="col-md-2">
        <h3 style="color: white;">Quick Links</h3>
        <hr>
        <a href="#" ><li style="color: white; text-decoration: none;">Course</li></a>
         <li style="color: white;">Our Faculty</li>
         <li style="color: white;">Register</li>
         <li style="color: white;">Contact Us</li>
       </div>
       <div class="col-md-1"></div>
       <div class="col-md-3">
        <h3 style="color: white;">Contact Info</h3>
        <hr>
        <i style="color: white; font-size: 20px;" class="fa fa-map-marker" aria-hidden="true"></i> <span class="coninfo" >&nbsp;&nbsp;Changipur,Noorpur,Bijnor(Uttar Pradesh)</span>
        <br>
        <br>
        <i style="color: white; font-size: 20px;" class="fa fa-phone" aria-hidden="true"></i> <span class="coninfo">&nbsp;&nbsp;1345 789 458</span>
        <br>
        <br>
        <i style="color: white; font-size: 20px;" class="fa fa-envelope-o" aria-hidden="true"></i> <span class="coninfo">&nbsp;&nbsp;gpchangipur@gmail.com</span>
       
      </div>
       <div class="col-md-1"></div>
     </div>
     <br>
     <div class="row">
       <div class="col-md-12" style="background: #940b0e; min-height: 40px;">
          <p style="text-align: center; color: white; font-size: 15px; margin-top: 1%;"><i class="fa fa-copyright" aria-hidden="true"></i> 2021 | All Rights Reserved | Design by Team Ravi</p>
       </div>
     </div>
    </div>
 </div>
  </div>
</body>

</html>