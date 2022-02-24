<?php
include "db.php";



?>
<html>


    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <link href="css/fontawesome-all.css" rel="stylesheet">
    </head>
        
    <body>
        <div class="container-fluid">
            <br>
            <a href="index.php"><button class="btn btn-primary"><i class="fa fa-th-large" aria-hidden="true"></i> Dashborad</button></a>
            <hr style="height:2px;background-color:gray;" />
            <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1">
                <span style="font-size: 25px;">Action :</span>
            </div>
            <form method="POST">
            <div class="col-md-4">
                <select class="form-control" name="action">
                    <option>-Select Action-</option>
                    <option>Add Semester Book</option>
                    <option>Semester Book Quantity Manage</option>
                    <option>Add Other Book</option>
                    <option>Other Book Quantity Manage</option>
                    <option>Validity And Penalty</option>
                </select>
            </div>
            <div class="col-md-1"><input type="submit" class="btn btn-success"></div>
            </div>
            </form>
            <hr style="height:2px;background-color:gray;" />
            

            <?php
            if($_SERVER['REQUEST_METHOD']='POST')
            {
                $action=$_POST['action'];
                
                
            switch($action) {
                case 'Add Semester Book': 
                    ?>
                         <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form method="POST">
                        <br>
                        <br>
                    <label>Select Branch <span style="color: red;">*</span></label>
                  <select class="form-control" name="branch" required>
                    <option>-Select Branch-</option>
                    <option value="Computer Science Engineering">1. Computer Science Engineering</option>
                    <option value="Civil Engineering">2. Civil Engineering</option>
                    <option value="Textile Technology">3. Textile Technology</option>
                    
                  </select>
                  <br>
                  <label>Select Semester <span style="color: red;">*</span></label>
                  <select class="form-control" name="sem" required>
                    <option >-Select Semester-</option>
                    <option value="1st Semester">1st Semester</option>
                    <option value="2nd Semester">2nd Semester</option>
                    <option value="3rd Semester">3rd Semester</option>
                    <option value="4th Semester">4th Semester</option>
                    <option value="5th Semester">5th Semester</option>
                    <option value="6th Semester">6th Semester</option>
                  </select>
                  <br>
                  <label>Book Name</label>
                  <input type="text" class="form-control" name="bookname">
                  <br>
                  <label>Quantity</label>
                  <input type="number" class="form-control" name="quantity">
                  <br>
                  <input type="submit" class="form-control btn btn-success" value="Submit" name="btn_2">
                  <input type="text" value="add" name="action" style="display: none;">
                    </form>
                </div>
            </div>
            <?php
                break;




                case 'Semester Book Quantity Manage':
                ?>
                <br>
                <br>
                <br>
                <br>
                <form method="POST">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-1"><span style="font-size: 18px;">Branch</span></div>
                    <div class="col-md-3">
                    <select class="form-control" name="branch" required>
                    <option>-Select Branch-</option>
                    <option value="Computer Science Engineering">1. Computer Science Engineering</option>
                    <option value="Civil Engineering">2. Civil Engineering</option>
                    <option value="Textile Technology">3. Textile Technology</option>
                    
                  </select>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-1"><span style="font-size: 18px;">Semester</span></div>
                    <div class="col-md-3">
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
                    <div class="col-md-1">
                        <input type="submit" value="Fetch" class="btn btn-warning">
                    </div>
                    </form>
                </div>
                <hr style="height:2px;background-color:gray;" />
                <input type="text" value="quantity" name="action" style="display: none;">
                <?php
                break;
                
            }
        if(isset($_POST['action']))
        {
            if($action=="add")
            {
            echo $branch=$_POST['branch'];
            echo $branch=$_POST['sem'];
            echo $branch=$_POST['bookname'];
            echo $branch=$_POST['quantity'];
            }
        }
    }
       
       ?>
   
        </div>
    </body>
    
</html>