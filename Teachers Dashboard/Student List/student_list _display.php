<?php
   session_start();

   $link = mysqli_connect("localhost","root","","student_portal");
   if (mysqli_connect_error())
   {
     echo "Failed to connect to MySQL: ". mysqli_connect_error();
   }
   $branch = $_SESSION['branch'];
   $class = $_SESSION['class'];
   $semester= $_SESSION['semester'];
   $query = "SELECT usn,name,class,branch,semester from student where branch='$branch' and class='$class' and semester='$semester';";
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
            <a class="nav-link" href="http://localhost/project/Front_End/dashboard/Teachers%20Dashboard/teachers_dashboard.php">
              <span data-feather="file"></span>
              <h5> <strong>Dashboard</strong> </h5>
            </a>
          </li>

        </ul>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <br>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><strong>Studet List</strong></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">

          </div>

        </div>
      </div>
      <form action="http://localhost/project/Front_End/dashboard/Teachers%20Dashboard/Student%20List/student_list.php" method="post">

        <input type="submit"class="btn btn-primary my-2" value="Check Another Class">
      </form>
      <div class="table-responsive">
        <table class="table table-striped table-lg">
          <thead>
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
                while($rows=mysqli_fetch_assoc($result))
                {
             ?>
                  <tr>
                    <td> <?php echo $rows['usn']; ?>  </td>
                    <td> <?php echo $rows['name']; ?>  </td>
                    <td> <?php echo $rows['class']; ?>  </td>
                    <td> <?php echo $rows['branch']; ?>  </td>
                    <td> <?php echo $rows['semester']; ?>  </td>
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
</body>
</html>
