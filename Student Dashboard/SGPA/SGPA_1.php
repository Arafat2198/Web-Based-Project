<?php
    session_start();

    if(isset($_POST['submit']))
    {
      $num = $_POST['num'];
      if ($num=="")
      {
        echo " <script>alert('Please enter the number of Subjects before Proceeding !!');</script>";
      }
      else
      {
        $_SESSION['num']=$num;
        header("location:http://localhost/project/Front_End/dashboard/Student%20Dashboard/SGPA/SGPA_2.php");
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
            <a class="nav-link" href="http://localhost/project/Front_End/dashboard/Student%20Dashboard/student_dashboard.php">
              <span data-feather="file"></span>
              <h5> <strong>Dashboard</strong> </h5>
            </a>
          </li>
        </ul>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><strong><br>SGPA</strong></h1>
      </div>

      <form method="post">
          <div class="form-group">
            <label for="subject"> <h4>Enter The number of Subjects You have Written</h4> </label>
            <input type="number" name="num" class="form-control form-control-lg" id="subject" placeholder="Number">
          </div>
          <button type="submit" class="btn btn-success" name="submit">Submit</button>
      </form>

    </main>
  </div>
</div>
</body>
</html>
