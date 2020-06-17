<?php

      session_start();
      $link = mysqli_connect("localhost","root","","student_portal");
      if (mysqli_connect_error())
      {
        echo "Failed to connect to MySQL: ". mysqli_connect_error();
      }
      $usn = $_SESSION['id'];
      $query = "SELECT usn,name,class,branch,semester from student where usn='$usn';";
      $result = mysqli_query($link, $query);
      $rows=mysqli_fetch_assoc($result);
 ?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="starter-template.css">
  </head>
  <body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <img src="1200px-BMS_College_of_Engineering.svg.png" height="50" width="3.75%" alt="">
  &nbsp&nbsp&nbsp<h5><a href="http://localhost/project/Front_End/dashboard/Student%20Dashboard/student_dashboard.php" style="color: White; text-decoration: none;"> <strong>BMSCE</strong> </a></h5></a>
    <ul class="navbar-nav mr-auto">
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a href="http://localhost/project/Front_End/dashboard/Student%20Dashboard/Update/update_details.php" class="btn btn-primary my-1">Edit Profile</a>&nbsp&nbsp
      <a href="http://localhost/project/Front_End/Logout/logout.php" class="btn btn-primary my-2">LOG out</a>
    </form>
  </div>
</nav>

<main role="main" class="container">

  <div class="starter-template">
    <h1 style="border: 3px solid #29293d;"> <strong>Student Profile</strong> </h1>
    <br>
    <br>
    <img "width=200px height=200px;" src="blank-profile-picture-973460_1280.jpg" alt="">
    <br>
    <br>
    <p class="lead"> <strong>Name :</strong> <?php echo $rows['name'] ?></p>
    <p class="lead"> <strong>ID :</strong> <?php echo $rows['usn'] ?></p>
    <p class="lead"> <strong>Branch :</strong> <?php echo $rows['branch'] ?></p>
    <p class="lead"> <strong>Class :</strong> <?php echo $rows['class'] ?></p>
    <p class="lead"> <strong>Semester :</strong> <?php echo $rows['semester'] ?></p>
</div>
<br><br>
</main>
</body>
</html>
