<?php
    session_start();
    $num = $_SESSION['num'];
    $temp=$num;

    if(isset($_POST['submit']))
      {
        $credit=$_POST['credit'];
        $grade=$_POST['grade'];

        $sum_of_credits=0;
        $sgpa=0;
        $sum=0;
        for ($i=0; $i < $num; $i++)
        {
          $sum+=$credit[$i]*$grade[$i];
        }
        for ($i=0; $i < $num; $i++)
        {
          $sum_of_credits=$sum_of_credits+$credit[$i];
        }
        $sgpa=$sum/$sum_of_credits;
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
    <nav class="col-md-2 d-none d-md-block bg-light sidebar ">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">

          <li class="nav-item">
            <a class="nav-link" href="http://localhost/project/Front_End/dashboard/Student%20Dashboard/student_dashboard.php">
              <span data-feather="file"></span>
              <h5> <strong>Dashboard</strong> </h5>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/project/Front_End/dashboard/Student%20Dashboard/SGPA/SGPA_1.php">
              <span data-feather="file"></span>
              <h5> <strong>Go Back</strong> </h5>
            </a>
          </li>
        </ul>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><strong><br>Enter The Subject Credits and Grade scored for each Subject</strong></h1>
      </div>
      <form method="post">
        <div class="form-group">
          <?php while($temp>0)
              {
           ?>
              <select class="form-control-lg" id="tg1" name="credit[]" placeholder="Select">
                <option value="">Subject Credit..</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
              </select>
              &nbsp&nbsp<select class="form-control-lg" id="tg1" name="grade[]" placeholder="Select">
                <option value="">Grade Scored..</option>
                <option value="10">S</option>
                <option value="9">A</option>
                <option value="8">B</option>
                <option value="7">C</option>
                <option value="6">D</option>
                <option value="5">E</option>
                <option value="0">F</option>
              </select>
              <br>
              <br>
            <?php $temp=$temp-1;} ?>
        </div>
        <button type="submit" class="btn btn-success" name="submit">Calculate</button>
      </form>
      <h3><?php     if(isset($_POST['submit']))
                      {
                        echo "Your SGPA is: ".sprintf('%01.2f', $sgpa);
                      }
          ?></h3>
    </main>
  </div>
</div>
</body>
</html>
