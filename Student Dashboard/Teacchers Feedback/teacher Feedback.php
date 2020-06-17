<?php
    session_start();
    $link = mysqli_connect("localhost","root","","student_portal");
    if (mysqli_connect_error())
    {
      echo "Failed to connect to MySQL: ". mysqli_connect_error();
    }

    $usn = $_SESSION['id'];
    $sub_query= "SELECT sub_code,empid from feedback where usn='$usn';";
    $sub_result = mysqli_query($link, $sub_query);
    while($row = mysqli_fetch_assoc($sub_result))
    {
      $datas[]= $row;
    }
    if(isset($_POST['submit']))
     {
       $empid = $_POST['empid'];
       $sub_code= $_POST['sub_code'];
       $usn= $_SESSION['id'];
       if ($sub_code==""  || $empid=="")
       {
         echo " <script>alert('Please enter both the details before Proceeding !!');</script>";
       }

       else
        {
          $query = "SELECT * from feedback where (sub_code='$sub_code' and  empid='$empid' and usn='$usn');";
          $result = mysqli_query($link, $query);

          if(!$result)
            {
              echo "<script>alert('There has been an error please try again later !!);</script>";
              die();
            }
          if(mysqli_num_rows($result) > 0)
            {
              $_SESSION['sub_code']=$_POST['sub_code'];
              $_SESSION['empid']=$_POST['empid'];
              header("location:http://localhost/project/Front_End/dashboard/Student%20Dashboard/Teacchers%20Feedback/teacher_Feedback_given.php");
            }
          else
            {
              echo "<script>alert('No such Combination Present !!');</script>";
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
      <form method="post">


        <div class="form-group">
            <select class="form-control form-control-lg" id="tg1" name="sub_code" placeholder="Select">
              <option value="">Choose Your Subject Code...</option>
              <?php
                  foreach($datas as $data)
                    {
               ?>
              <option value="<?php echo $data['sub_code']; ?>"><?php echo $data['sub_code']; ?></option>
              <?php
                    }
               ?>
            </select>
            <br>
            <select class="form-control form-control-lg" id="tg1" name="empid" placeholder="Select">
              <option value="">Choose The Faculty Id...</option>
              <?php
                  foreach($datas as $data)
                    {
               ?>
              <option value="<?php echo $data['empid']; ?>"><?php echo $data['empid']; ?></option>
              <?php
                    }
               ?>
            </select>
        </div>


        <button type="submit" class="btn btn-primary btn-lg" name="submit">Submit</button>

      </form>
       <br>
       <br>


    </main>
  </div>
</div>
</body>
</html>
