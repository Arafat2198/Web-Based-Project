<?php

     session_start();
     $link = mysqli_connect("localhost","root","","student_portal");
     if (mysqli_connect_error())
     {
       echo "Failed to connect to MySQL: ". mysqli_connect_error();
     }
     $select = $_SESSION['select'];
     $usn = $_SESSION['usn'];
     $query = "SELECT usn,name,class,branch,semester from student where usn='$usn';";
     $result = mysqli_query($link, $query);
     if(isset($_POST['submit']))
     {
        $new = $_POST['new'];
        if ($new=="")
        {
          echo " <script>alert('Please enter the new Detail before Proceeding !!');</script>";
        }

        else if($select=="usn")
        {
          $query1 = "UPDATE student SET usn='$new' where usn='$usn';";
        }
        else if($select=="name")
        {
          $query1 = "UPDATE student SET name='$new' where usn='$usn';";
        }
        else if($select=="class")
        {
          $query1 = "UPDATE student SET class='$new' where usn='$usn';";
        }
        else if($select=="branch")
        {
          $query1 = "UPDATE student SET branch='$new' where usn='$usn';";
        }
        else if($select=="semester")
        {
          $query1 = "UPDATE student SET semester='$new' where usn='$usn';";
        }
        $result = mysqli_query($link,$query1);
        if(!$result)
        {
          echo " <script>alert('There has been an ERROR please try again later !!');</script>";
        }
        else
        {
          header("location:http://localhost/project/Front_End/dashboard/Admin%20Dashboard/student/Update_info/Student_Details_Update_2.php");
          exit();
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
              <h5> Dashboard </h5>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/project/Front_End/dashboard/Admin%20Dashboard/student/student.php">
              <span data-feather="file"></span>
              <h5> Student Admin </h5>
            </a>
          </li>

        </ul>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><strong><br>Update Student Details</strong></h1>
      </div>
        <div class="table-responsive">
          <table class="table table-bordered table-la">
            <thead class="thead-light">
              <tr>
                <th>USN</th>
                <th>Name</th>
                <th>Class</th>
                <th>Branch</th>
                <th>Semester</th>
                <br>
              </tr>
            </thead>
            <tbody>
              <?php
                    $rows=mysqli_fetch_assoc($result)
               ?>
                    <tr>
                      <td> <?php echo $rows['usn']; ?>  </td>
                      <td> <?php echo $rows['name']; ?>  </td>
                      <td> <?php echo $rows['class']; ?>  </td>
                      <td> <?php echo $rows['branch']; ?>  </td>
                      <td> <?php echo $rows['semester']; ?>  </td>
                    </tr>
            </tbody>
          </table>
        </div>
        <br>
        <form method="post">
          <input class="form-control form-control-lg" type="text" name="new" placeholder="New <?php echo $select ?> here">
          <br>
          <button type="submit" class="btn btn-success btn-lg" name="submit">UPDATE</button>
        </form>

    </main>
  </div>
</div>
</body>
</html>
