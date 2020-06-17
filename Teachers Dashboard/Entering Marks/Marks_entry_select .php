<?php

     session_start();

 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="dashboard.css">
<head><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style media="screen">
  .card {display:inline-block;}
</style>

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
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Multiple Update</h5>
          <h6 class="card-subtitle mb-2 text-muted">Multiple Students</h6>
          <p class="card-text">Update the marks of a Multiple students who already have an Entry in the Results Table. Requires a valid <b>Subject-Code</b> and <b>Semeseter</b> and <b>Class</b> </p>
          <a href="http://localhost/project/Front_End/dashboard/Teachers%20Dashboard/Entering%20Marks/Marks_entry_update.php" class="btn btn-sm btn-success my-2">UPDATE</a>
        </div>
      </div>
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
      <div class="card" style="width: 18rem; ">
        <div class="card-body">
          <h5 class="card-title">Single Insert</h5>
          <h6 class="card-subtitle mb-2 text-muted">Single Student</h6>
          <p class="card-text">Insert the marks of a single student for the first time. Requires a valid <b>Subject-Code</b> and <b>USN</b>
              <br>
              <br>
              <br>
          </p>
          <a href="http://localhost/project/Front_End/dashboard/Teachers%20Dashboard/Entering%20Marks/Marks_entry_insert.php" class="btn btn-sm btn-success my-2">INSERT</a>
        </div>
      </div>
      <div class="card" style="width: 18rem; ">
        <div class="card-body">
          <h5 class="card-title">Multiple Display</h5>
          <h6 class="card-subtitle mb-2 text-muted">Multiple Student</h6>
          <p class="card-text">Display all the examination marks of all the Students in a specifice class of a specific <b>branch</b>, <b>Subject-Code</b> and <b>Class</b>
            <br>
            <br>
          </p>
          <a href="http://localhost/project/Front_End/dashboard/Teachers%20Dashboard/Entering%20Marks/Marks_DISPLAY_.php" class="btn btn-sm btn-success my-2">DISPLAY</a>
        </div>
      </div>
    </main>
  </div>
</div>
</body>
</html>
