<?php

  session_start();
  $link = mysqli_connect("localhost","root","","student_portal");
  if (mysqli_connect_error())
  {
    echo "Failed to connect to MySQL: ". mysqli_connect_error();
  }


  if(isset($_POST['submit']))
  {
      $empid = $_POST['empid'];
      $password = $_POST['password'];

      if ($empid=="" || $password=="")
      {
        echo "<script>alert('Please enter both the details before Proceeding !!');</script>";
      }

    else
      {
          $query = "SELECT empid from teacher where empid='$empid' and password='$password' and status='1'";
          $result = mysqli_query($link, $query);
          if(!$result)
            {
              echo "<script>alert('There has been an error please try again later !!);</script>";
              die();
            }

          if(mysqli_num_rows($result) > 0)
            {
              echo "<script>alert('Welcome !!');</script>";
              $_SESSION['id']=$_POST['empid'];
              $_SESSION['name']="teacher";
              header("location:http://localhost/project/Front_End/dashboard/Teachers%20Dashboard/teachers_dashboard.php");
              exit();

            }
          else
            {
              echo "<script>alert('Invalid Username and ID match !!');</script>";
            }
      }
  }

 ?>


<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap.min.css">
<style media="screen">
  .jumbotron
  {
    width: 500px;
    position: inherit;
    color: warning;
  }
   .container
   {
     color: inherit;
   }
  body
   {
     background-image: url('D4Qth5wUwAE4Ebb.jpg');
     background-repeat: no-repeat;
     background-attachment: fixed;
     background-size: cover;
   }
  .jumbotron
   {
     transition: 1400ms;
     opacity: 0.9;
   }
</style>
</head>

<body>
<div class="container">
    <br>
    <br>
      <div class="jumbotron" >
        <h1 class="display-5">Faculty Login</h1>
        <p class="lead">Enter the Details</p>

            <form method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1"> <h5> <b>EMPID</b> </h5> </label>
                  <input type="text" name="empid"class="form-control" placeholder="EMPID" >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1"> <h5> <b>Password</b></h5> </label>
                  <input type="password" name="password" class="form-control" placeholder="Password" >
                </div>
                <div class="form-group form-check">
                <button type="submit" class="btn btn-primary" name="submit">Login</button>
              </div>
            </form>

      </div>
    </div>
  </div>
</body>
</html>
