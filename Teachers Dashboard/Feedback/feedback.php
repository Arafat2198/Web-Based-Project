<?php
      session_start();
      $link = mysqli_connect("localhost","root","","student_portal");
      if (mysqli_connect_error())
      {
        echo "Failed to connect to MySQL: ". mysqli_connect_error();
      }
      $empid= $_SESSION['id'];
      $sub_query= "SELECT DISTINCT sub_code from results where empid='$empid';";
      $sub_result = mysqli_query($link, $sub_query);
      while($row = mysqli_fetch_assoc($sub_result))
      {
        $datas[]= $row;
      }
      if(isset($_POST['submit']))
      {
        $usn= $_POST['usn'];
        $sub_code= $_POST['sub_code'];
        $feedback= $_POST['feedback'];
        if ( $usn=="" || $sub_code==""|| $feedback=="")
        {
          echo " <script>alert('Please enter all the details before Proceeding !!');</script>";
        }
        else
        {
          $query = "SELECT * from feedback where usn='$usn'and sub_code='$sub_code' ;";
          $result = mysqli_query($link,$query);

          if(mysqli_num_rows($result)>0)
            {
              $query = "UPDATE feedback SET feedback='$feedback' WHERE usn='$usn' and sub_code='$sub_code';";
              $result = mysqli_query($link, $query);
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
              $query = "INSERT INTO feedback(usn,sub_code,empid,feedback)VALUES ('$usn', '$sub_code', '$empid','$feedback');";
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
      <br>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><strong>Enter the Details of the Student: </strong></h1>
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
        </div>
      <div class="form-group">
          <input type="text" name="usn" class="form-control form-control-lg" placeholder="Enter Student USN" >
        </div>
      <br>
      <br>
      <div class="form-group">
      <label for="exampleFormControlTextarea1">Enter the Feedback below</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="feedback"></textarea>
      <br>
      <button type="submit" class="btn btn-success" name="submit">Submit</button>
      </form>
      </div>
    </main>
  </div>
</div>
</body>
</html>
