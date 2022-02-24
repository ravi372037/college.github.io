
<html>
    <head>
        
        <link rel="stylesheet" href="css/font-awesome.min.css"/>
        <link rel="stylesheet" href="css/hover-min.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </head>
    <body>
        <div class="container-fluid">
            <br>
            <div class="row">
                <div class="col-md-4" >
                   <a href="index.php"> <button class="btn btn-primary">Home</button></a>
                
                </div>
            </div>
            <hr style="height:2px;background-color:gray;" />
                <div class="row">
                    <div class="col-md-4"></div>
                <div class="col-md-4" style="box-shadow: 0px 3px 5px 2px gray; border-radius:5px; ">
                    <form action="log.php" method="post">
                        <br>
                        
                        <?php
                    if(isset($_GET['error']))
                            { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error !</strong> <?=$_GET['error']?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php } ?>
                            <?php
                    if(isset($_GET['log']))
                            { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> <?=$_GET['log']?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php } ?>
                          
                            <img class="hvr hvr-pop" src="img/g.png" height="80"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <span style=" font-size:38px;"><i class="fa fa-lock" aria-hidden="true"></i> Login Here</span>
                            <hr style="height:2px;background-color:gray;" />
                        <select class="form-control" name="role">
                            <option value="0" >Select User Type</option>
                            <option value="principal">Principal</option>
                            <option value="teacher">Teacher</option>
                            <option value="library">Library</option>
                            <option value="student">Student</option>
                        </select>
                        <br>
                        <label>User Name :</label>
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <i class="fa fa-user input-group-text" aria-hidden="true" ></i>
                            </div>
                                <input type="email" class="form-control" name="username" placeholder="example@gmail.com" >
                        </div>
                        <br>
                        <label>Password :</label>
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <i class="fa fa-key input-group-text" aria-hidden="true" ></i>
                            </div>
                            <input type="password" class="form-control" name="password"  placeholder="Enter Password">
                        </div>
                        <hr style="height:2px;background-color:gray;" />
                        <input type="submit" class="btn btn-success"> <input type="reset" class="btn btn-danger" value="Clear">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>