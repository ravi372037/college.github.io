<?php
  session_start();

  include "db.php";

  if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role']))
  {

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $role = test_input($_POST['role']);

    if(empty($username))
    {
      header("Location: login.php?error=User Name is Required");
    }
    else if(empty($password))
    {
      header("Location: login.php?error=Password is Required");
    }
    else if(!$role)
    {
      header("Location: login.php?error=Please Select User Type");
    }
    else
    {
      if($role == 'student')
      {
      $password = md5($password);
      $sql = "SELECT * FROM student WHERE email='$username' AND epassword='$password' AND role='student'";
      $result = mysqli_query($con,$sql);
      if(mysqli_num_rows($result) === 1)
      {
        $row=mysqli_fetch_assoc($result);
        if($row['epassword'] === $password && $row['role']==$role)
        {
          $_SESSION['email'] = $row['email'];
          $_SESSION['epassword'] = $row['epassword'];
         
          header("Location: student/index.php");
        } 
        
      }
      else
       {
          header("Location: login.php?error= User Type or Username or Password is incorrect");
       }
    }
    else if($role == 'principal')
    {
    $password = md5($password);
    $sql = "SELECT * FROM login WHERE email='$username' AND password='$password' AND role='principal'";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result) === 1)
    {
      header("Location: image.php");
    }
    else
  {
    header("Location: login.php?error= User Type or Username or Password is incorrect");
  }
  }
  elseif($role == 'teacher')
  {
  $password = md5($password);
  $sql = "SELECT * FROM login WHERE email='$username' AND password='$password' AND role='teacher'";
  $result = mysqli_query($con,$sql);
  if(mysqli_num_rows($result) === 1)
  {
    header("Location: staff.php");
  }
  else
  {
    header("Location: login.php?error= User Type or Username or Password is incorrect");
  }
}
  elseif($role == 'library')
  {
  $password = md5($password);
  $sql = "SELECT * FROM login WHERE email='$username' AND password='$password' AND role='library'";
  $result = mysqli_query($con,$sql);
  if(mysqli_num_rows($result) === 1)
  {
    $row=mysqli_fetch_assoc($result);
        if($row['password'] === $password && $row['role']==$role)
        {
          $_SESSION['email'] = $row['email'];
          $_SESSION['password'] = $row['password'];
          $_SESSION['start']=time();
          $_SESSION['expire'] = $_SESSION['start'] + (600);
          header("Location: library/index.php");
        }
  }
  else
  {
    header("Location: login.php?error= User Type or Username or Password is incorrect");
  }
}
   

}
    
  }
  else
  {
    header("Location: login.php");
  }
