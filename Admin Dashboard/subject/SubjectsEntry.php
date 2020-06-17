<?php

     session_start();
     $link = mysqli_connect("localhost","root","","student_portal");
     if (mysqli_connect_error())
     {
       echo "Failed to connect to MySQL: ". mysqli_connect_error();
     }
     if(isset($_POST['submit']))
     {

        $sub_code= $_POST['sub_code'];
        $sub_name= $_POST['sub_name'];

        if ($sub_code=="")
        {
          echo " <script>alert('Please enter both all details before Proceeding !!');</script>";
        }

        $query = "SELECT sub_code from subjects where sub_code='$sub_code';";
        $result = mysqli_query($link, $query);

        if(mysqli_num_rows($result)>0)
        {
          echo " <script>alert('Subject Code already taken !!');</script>";
        }
        else
        {
            $query1 = "INSERT INTO subjects(sub_code,sub_name) VALUES('$sub_code','$sub_name');";
            $result = mysqli_query($link, $query1);
            if(!$result)
            {
              echo " <script>alert('There has been an error please try again Later !!');</script>";
            }
            else
            {
              echo " <script>alert('Subject Added !!');</script>";
            }
        }
      }

 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="dashboard.css">
<head><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <img src="1200px-BMS_College_of_Engineering.svg.png" height="50" width="3.75%" alt="">
  &nbsp&nbsp&nbsp<h5><a  style="color: White"> BMCSE</a></h5></a>
    <ul class="navbar-nav mr-auto">
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a href="http://localhost/project/Front_End/Logout/logout.php" class="btn btn-primary my-2"><strong>LOG out</strong></a>
    </form>
  </div>
  </nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">

          <li class="nav-item">
            <a class="nav-link" href="http://localhost/project/Front_End/dashboard/Admin%20Dashboard/admin_dashboard.php">
              <span data-feather="file"></span>
              <h5> <strong>Dashboard</strong> </h5>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/project/Front_End/dashboard/Admin%20Dashboard/subject/subject_select.php">
              <span data-feather="file"></span>
              <h5> Option Select </h5>
            </a>
          </li>
        </ul>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><strong><br>Subjects Entry</strong></h1>
      </div>
      <form method="post">
        <div class="form-group">
          <label for="exampleInputEmail1"> Enter New Subject Code</label>
          <input type="text" name="sub_code" class="form-control" placeholder="" >
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1"> Enter New Subject Name</label>
          <input type="text" name="sub_name" class="form-control " >
        </div>
         <br>
         <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>
    </main>
  </div>
</div>
</body>
</html>
