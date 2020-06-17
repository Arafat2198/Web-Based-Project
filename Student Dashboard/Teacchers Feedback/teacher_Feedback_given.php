<?php
    session_start();
    $link = mysqli_connect("localhost","root","","student_portal");
    if (mysqli_connect_error())
    {
      echo "Failed to connect to MySQL: ". mysqli_connect_error();
    }


    $sub_code= $_SESSION['sub_code'];
    $empid = $_SESSION['empid'];
    $usn = $_SESSION['id'];
    $query = "SELECT feedback from feedback where(empid = '$empid' and sub_code = '$sub_code'and usn='$usn');";
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
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="home"></span>
            </a>
          </li>
        </ul>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <br>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><strong>Teacher Feedback: </strong></h1>
      </div>
      <form  method="post" action="http://localhost/project/Front_End/dashboard/Student%20Dashboard/Teacchers%20Feedback/teacher%20Feedback.php">
        <input type="submit" class="btn btn-primary my-2" value="Click for other Subjects">
      </form>
       <br>
       <br>
       <?php
               $rows=mysqli_fetch_assoc($result)
        ?>
     <textarea rows="10" cols="150" readonly>  <?php echo $rows['feedback']; ?>
     </textarea>

    </main>
  </div>
</div>
</body>
</html>
