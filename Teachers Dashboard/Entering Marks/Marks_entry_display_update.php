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

   $list_query = "SELECT usn ,internal_1,internal_2,quiz,lab from results
                  where semester='$semester' and sub_code='$sub_code' and class='$class';";
   $result_list = mysqli_query($link,$list_query);

   while ($usn_rows = mysqli_fetch_assoc($result_list))   // Fetching the accosicate array
   {
        $datas1[] = $usn_rows;
   }

  foreach($datas1 as $data)     // looping the associate array of usn into a normal array for the usn to be used in the queries
  {
        $usn[] = $data['usn'];
  }

  $number = count($usn);

   if(isset($_POST['submit']))
   {
       $internal1=$_POST['internal1'];
       $internal2=$_POST['internal2'];
       $quiz=$_POST['quiz'];
       $lab=$_POST['lab'];

       $i=0;
       while($i < $number)
       {
         if($internal1[$i] != "")
         {
           $query = "UPDATE results SET internal_1='$internal1[$i]' where usn='$usn[$i]' and empid='$empid' and sub_code='$sub_code';";
           $result = mysqli_query($link,$query);
         }
         $i=$i+1;
       }
       $i=0;
       while($i < $number)
       {
         if($internal2[$i] != "")
         {
           $query = "UPDATE results SET internal_2='$internal2[$i]' where usn='$usn[$i]' and empid='$empid' and sub_code='$sub_code';";
           $result = mysqli_query($link,$query);
         }
         $i=$i+1;
       }
       $i=0;
       while($i < $number)
       {
         if($quiz[$i] != "")
         {
           $query = "UPDATE results SET quiz='$quiz[$i]' where usn='$usn[$i]' and empid='$empid' and sub_code='$sub_code';";
           $result = mysqli_query($link,$query);
         }
         $i=$i+1;
       }
       $i=0;
       while($i < $number)
       {
         if($lab[$i] != "")
         {
           $query = "UPDATE results SET lab='$lab[$i]' where usn='$usn[$i]' and empid='$empid' and sub_code='$sub_code';";
           $result = mysqli_query($link,$query);
         }
         $i=$i+1;
       }
       echo " <script>alert('UPDATE Successfull !!');</script>";
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


      <form  action="http://localhost/project/Front_End/dashboard/Teachers%20Dashboard/Entering%20Marks/Marks_entry_update.php" method="post">
        <input type="submit"class="btn btn-primary " value="Enter for another Class">
      </form>


      <div class="table-responsive">
        <table class="table table-light table-striped table-lg">
          <thead>
            <tr>
              <th>USN</th>
              <th>Internal 1</th>
              <th>Internal 2</th>
              <th>Quiz</th>
              <th>Lab</th>
              <br>
            </tr>
          </thead>
          <form  method="post">
          <tbody>
            <?php
            $list_query = "SELECT usn ,internal_1,internal_2,quiz,lab from results
                           where semester='$semester' and sub_code='$sub_code' and class='$class';";
            $result_list = mysqli_query($link,$list_query);

            while ($usn_rows = mysqli_fetch_assoc($result_list))   // Fetching the accosicate array
            {
                 $datas[] = $usn_rows;
            }
                        foreach($datas as $data)
                       {
             ?>
            <tr>
                <td><strong><?php  echo $data['usn']; ?></strong></td>
                <td><input type="number" name="internal1[]" placeholder="<?php echo $data['internal_1'];?>" ></td>
                <td><input type="number" name="internal2[]" placeholder="<?php echo $data['internal_2']; ?>"></td>
                <td><input type="number" name="quiz[]" placeholder="<?php echo $data['quiz']; ?>"></td>
                <td><input type="number" name="lab[]" placeholder="<?php echo $data['lab']; ?>"></td>
            </tr>
          <?php
            }
          ?>
          </tbody>
        </table>
        <button type="submit" class="btn btn-success" name="submit">Submit</button>
      </form>
      </div>
    </main>
  </div>
</div>
</div>
</body>
</html>
