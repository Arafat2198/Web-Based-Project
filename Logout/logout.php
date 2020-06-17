<?php
  session_start();
  if($_SESSION['name']=="teacher")
  {
    session_unset();
    session_destroy();
    header("location:http://localhost/project/Front_End/Login/Teacher%20login/login_teacher.php");
  }
  else if($_SESSION['name']=="student")
  {
    session_unset();
    session_destroy();
    header("location:http://localhost/project/Front_End/Login/Student%20Login/login_student.php");
  }
  else if($_SESSION['name']=="admin")
  {
    session_unset();
    session_destroy();
    header("location:http://localhost/project/Front_End/Login/Admin%20Login/login_admin.php");
  }
  else if(!$_SESSION['name'])
  {
    header("location:http://localhost/project/Front_End/Login/Admin%20Login/login_admin.php");
  }
?>
