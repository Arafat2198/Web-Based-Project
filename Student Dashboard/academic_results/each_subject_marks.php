<?php
   session_start();

   $link = mysqli_connect("localhost","root","","student_portal");
   if (mysqli_connect_error())
   {
     echo "Failed to connect to MySQL: ". mysqli_connect_error();
   }

   $sub_code= $_SESSION['sub_code'];
   $usn = $_SESSION['id'];

   $query = "SELECT sub_code,internal_1,internal_2,quiz,lab from results where(usn = '$usn' and sub_code = '$sub_code');";
   $result = mysqli_query($link, $query);
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
            <a class="nav-link" href="http://localhost/project/Front_End/dashboard/Student%20Dashboard/student_dashboard.php">
              <span data-feather="file"></span>
              <h5> <strong>Dashboard</strong> </h5>
            </a>
          </li>

    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <br>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><strong>Results</strong></h1>
        <div class="btn-toolbar mb-2 mb-md-0">


        </div>
      </div>
      <form class="" action="http://localhost/project/Front_End/dashboard/Student%20Dashboard/academic_results/each_subject.php" method="post">
      <input type="submit" class="btn  btn-primary my-2" value="Enter Another Code">
      </form>

      <table class="table table-bordered table-lg">
        <thead class="thead-light">
          <tr>
            <th scope="col">Subject Code</th>
            <th scope="col">Internal_1</th>
            <th scope="col">Internal_2</th>
            <th scope="col">Quiz</th>
            <th scope="col">Lab</th>
          </tr>
        </thead>
        <tbody>
      <?php
              $rows=mysqli_fetch_assoc($result)
       ?>

            <tr>
              <td> <?php echo $rows['sub_code']; ?>  </td>
              <td> <?php echo $rows['internal_1']; ?>  </td>
              <td> <?php echo $rows['internal_2']; ?>  </td>
              <td> <?php echo $rows['quiz']; ?>  </td>
              <td> <?php echo $rows['lab']; ?>  </td>
            </tr>

        </tbody>
      </table>
    </main>


  </div>
</div>


</body>
</html>
