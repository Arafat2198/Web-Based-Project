<?php
   session_start();

   $link = mysqli_connect("localhost","root","","student_portal");
   if (mysqli_connect_error())
   {
     echo "Failed to connect to MySQL: ". mysqli_connect_error();
   }

   $link = mysqli_connect("localhost","root","","student_portal");

   $query = "SELECT empid,name,post,branch,email,password from teacher where status='0';";
   $result1 = mysqli_query($link, $query);

   if (mysqli_num_rows($result1)>0)
   {
     while($row = mysqli_fetch_assoc($result1))
     {
       $datas[]= $row;
     }
     if(isset($_POST['submit']))
     {

         if(!empty($_POST['empid']))
         {

             foreach($_POST['empid'] as $value)
             {
                 $query1 = "UPDATE teacher set status='1' where empid='$value';";
                 mysqli_query($link, $query1);
             }
             echo "Selected Accounts have been Approved !!";
             header("location:http://localhost/project/Front_End/dashboard/Admin%20Dashboard/teacher/Authenticate/Authenication_teacher.php");
         }
         else
         {
             echo "Nothing Selected !!";
         }
     }
   }
?>
<html lang="en" dir="ltr">
  <head>

    <style media="screen">
        input[type="checkbox"]{
        width: 20px;
        height: 20px;
        }

    #table1{
        text-align: center;
    }
    </style>
    <link rel="stylesheet" href="check.css">
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
            <a class="nav-link" href="http://localhost/project/Front_End/dashboard/Admin%20Dashboard/admin_dashboard.php">
              <span data-feather="file"></span>
              <h5> Dashboard </h5>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/project/Front_End/dashboard/Admin%20Dashboard/teacher/teacher.php">
              <span data-feather="file"></span>
              <h5> Teacher Admin </h5>
            </a>
          </li>
        </ul>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <br>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><strong>Teacher Account Approval  List</strong></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>
      <form method="post">
      <div class="table-responsive">
        <table id='table1' class="table table-striped ">
          <thead  class="thead-light">
            <tr>
              <th>Emp-id</th>
              <th>Name</th>
              <th>Post</th>
              <th>Branch</th>
              <th>Email</th>
              <th style="text-align: center;">Approve</th>
              <br>
            </tr>
          </thead>
          <tbody>
            <?php
                if(mysqli_num_rows($result1)>0)
                {
                    foreach($datas as $data)
                   {
             ?>
                  <tr>
                    <td> <?php echo $data['empid']; ?>  </td>
                    <td> <?php echo $data['name']; ?>  </td>
                    <td> <?php echo $data['post']; ?>  </td>
                    <td> <?php echo $data['branch']; ?>  </td>
                    <td> <?php echo $data['email']; ?>  </td>
                    <td style="text-align: center;">  <div class="form-group form-check">
                          <input  type="checkbox" value="<?php echo $data['empid']; ?>"class="form-check-input" name="empid[]">
                          </div>
                    </td>
                  </tr>
            <?php
                   }
                }
             ?>
          </tbody>
        </table>
        <?php
        if (mysqli_num_rows($result1)==0)
        {
          echo '<h6> &nbsp&nbspNo Accounts Left </h6> <br>';
        }
        ?>
        <button type="submit" class="btn btn-success" name="submit">Approve</button>
       </form>
      </div>
    </main>
  </div>
</div>
</body>
</html>
