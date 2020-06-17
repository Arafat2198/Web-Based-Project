<?php
   session_start();
   $link = mysqli_connect("localhost","root","","student_portal");
   if (mysqli_connect_error())
   {
     echo "Failed to connect to MySQL: ". mysqli_connect_error();
   }
   if(isset($_POST['submit']))
   {
       $internal1=$_POST['internal1'];
       $internal2=$_POST['internal2'];
       $quiz=$_POST['quiz'];
       $lab=$_POST['lab'];
       $sub_code= $_SESSION['sub_code'];
       $usn=$_SESSION['usn'];
       $empid=$_SESSION['id'];
       $class=$_SESSION['class'];
       $semester=$_SESSION['semester'];

       if ( $internal1=="" || $internal2==""|| $quiz==""|| $lab=="")
       {
         echo " <script>alert('Please enter all the details before Proceeding !!');</script>";
       }

       else
       {
         $query = "SELECT * from results where usn='$usn'and sub_code='$sub_code' ;";
         $result = mysqli_query($link,$query);

         if(mysqli_num_rows($result)==1)
           {
             $query1 = "UPDATE results SET internal_1='$internal1' ,internal_2='$internal2' ,quiz='$quiz' ,lab='$lab' WHERE usn='$usn' and sub_code='$sub_code';";
             $result = mysqli_query($link, $query1);
             if($result)
                 {
                   echo " <script>alert('Update Successful !!');</script>";
                 }
             else
                 {
                   echo "<script>alert('There has been an error please try again later !!);</script>";
                 }
           }
         else
           {
             $query = "INSERT INTO results(usn,sub_code,empid,internal_1,internal_2,quiz,lab,class,semester)
                      VALUES ('$usn', '$sub_code', '$empid','$internal1','$internal2','$quiz','$lab','$class','$semester');";
             $result = mysqli_query($link, $query);
             if($result)
                 {
                   echo " <script>alert('Entry Successful !!');</script>";
                 }
            else
                 {
                   echo " <script>alert('There has been an error Please try again later !!');</script>";
                 }
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
      <form  action="http://localhost/project/Front_End/dashboard/Teachers%20Dashboard/Entering%20Marks/Marks_entry_insert.php" method="post">
        <input type="submit"class="btn btn-primary " value="Enter for another Student">

      </form>

      <div class="table-responsive">
        <table class="table table-striped table-lg">
          <thead class="table-active ">
            <tr>
              <th>USN:</th>
              <th>Internal 1:</th>
              <th>Internal 2:</th>
              <th>Quiz:</th>
              <th>Lab:</th>
              <br>
            </tr>
          </thead>
          <form  method="post">
          <tbody>
            <tr>
                <td><strong><?php $usn=$_SESSION['usn']; echo $usn; ?></strong></td>
                <td><input type="number" name="internal1" ></td>
                <td><input type="number" name="internal2"></td>
                <td><input type="number" name="quiz"></td>
                <td><input type="number" name="lab"></td>
            </tr>
          </tbody>
        </table>
        <button type="submit" class="btn btn-success" name="submit">Submit</button>
      </form>
      </div>
    </main>
  </div>
</div>
</body>
</html>
