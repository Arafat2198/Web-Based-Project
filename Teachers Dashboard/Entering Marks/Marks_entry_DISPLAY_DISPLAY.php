<?php
   session_start();
   $link = mysqli_connect("localhost","root","","student_portal");
   if (mysqli_connect_error())
   {
     echo "Failed to connect to MySQL: ". mysqli_connect_error();
   }

   $semester= $_SESSION['semester'];
   $sub_code= $_SESSION['sub_code'];
   $class= $_SESSION['class'];
   $empid= $_SESSION['id'];

   $list_query = "SELECT usn,sub_code,class,semester,internal_1,internal_2,quiz,lab from results
                  where semester='$semester' and sub_code='$sub_code' and class='$class';";
   $result_list = mysqli_query($link,$list_query);

  if(!$result_list)
  {
    echo " <script>alert('There has been an error please try later !!');</script>";
    header("location:http://localhost/project/Front_End/dashboard/Teachers%20Dashboard/Entering%20Marks/Marks_DISPLAY_.php");

  }

   while ($usn_rows = mysqli_fetch_assoc($result_list))   // Fetching the accosicate array
   {
        $datas[] = $usn_rows;
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
            <a class="nav-link" href="http://localhost/project/Front_End/dashboard/Teachers%20Dashboard/teachers_dashboard.php">
              <span data-feather="file"></span>
              <h5> <strong>Dashboard</strong> </h5>
            </a>
          </li>
        </ul>
    </nav>


    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><strong><br>Results Entry</strong></h1>
      </div>


      <form  action="http://localhost/project/Front_End/dashboard/Teachers%20Dashboard/Entering%20Marks/Marks_DISPLAY_.php" method="post">
        <input type="submit"class="btn btn-primary " value="Enter for another Class">
      </form>


      <div class="table-responsive">
        <table class="table  table-striped table-lg table-bordered">
          <thead>
            <tr>
              <th>USN:</th>
              <th>Subject-Code</th>
              <th>Class</th>
              <th>Semester</th>
              <th>Internal 1:</th>
              <th>Internal 2:</th>
              <th>Quiz:</th>
              <th>Lab:</th>
              <br>
            </tr>
          </thead>
          <tbody>
            <?php
                        foreach($datas as $data)
                       {
             ?>
            <tr>
                <td><strong><?php  echo $data['usn']; ?></strong></td>
                <td><?php  echo $data['sub_code']; ?></td>
                <td><?php  echo $data['class']; ?></td>
                <td><?php  echo $data['semester']; ?></td>
                <td><?php  echo $data['internal_1']; ?></td>
                <td><?php  echo $data['internal_2']; ?></td>
                <td><?php  echo $data['quiz']; ?></td>
                <td><?php  echo $data['lab']; ?></td>
            </tr>
          <?php
            }
          ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
</div>
</body>
</html>
