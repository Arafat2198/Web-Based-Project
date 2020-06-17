<?php
   session_start();

   $link = mysqli_connect("localhost","root","","student_portal");
   if (mysqli_connect_error())
   {
     echo "Failed to connect to MySQL: ". mysqli_connect_error();
   }

   $link = mysqli_connect("localhost","root","","student_portal");

   $query = "SELECT usn,name,class,branch,semester,password from student where status='1';";
   $result1 = mysqli_query($link, $query);

   if (mysqli_num_rows($result1)>0)
   {
     while($row = mysqli_fetch_assoc($result1))
     {
       $datas[]= $row;
     }
     if(isset($_POST['submit1']))
     {

         if(!empty($_POST['usn']))
         {

             foreach($_POST['usn'] as $value)
             {
                 $query1 = "UPDATE student set status='0' where usn='$value';";
                 mysqli_query($link, $query1);
             }
             echo "Selected Accounts have been Blocked !!";
             header("location:http://localhost/project/Front_End/dashboard/Admin%20Dashboard/student/Block_Remove/Remove_Block_student.php");
         }
         else
         {
             echo "Nothing Selected !!";
         }
     }
     if(isset($_POST['submit2']))
     {

         if(!empty($_POST['usn']))
         {

             foreach($_POST['usn'] as $value)
             {
                 $query2 = "DELETE from student where usn='$value';";
                 mysqli_query($link, $query2);
             }
             echo "Selected Accounts have been Removed!!";
             header("location:http://localhost/project/Front_End/dashboard/Admin%20Dashboard/student/Block_Remove/Remove_Block_student.php");
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
            <a class="nav-link" href="http://localhost/project/Front_End/dashboard/Admin%20Dashboard/student/student.php">
              <span data-feather="file"></span>
              <h5> Student Admin </h5>
            </a>
          </li>
        </ul>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <br>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><strong>Approved Student Accounts</strong></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>
      <form method="post">
      <div class="table-responsive">
        <table id='table1' class="table">
          <thead  class="thead-light">
            <tr>
              <th>USN</th>
              <th>Name</th>
              <th>Class</th>
              <th>Branch</th>
              <th>Semester</th>
              <th>Password</th>
              <th>Block / Delete</th>
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
                    <td> <?php echo $data['usn']; ?>  </td>
                    <td> <?php echo $data['name']; ?>  </td>
                    <td> <?php echo $data['class']; ?>  </td>
                    <td> <?php echo $data['branch']; ?>  </td>
                    <td> <?php echo $data['semester']; ?>  </td>
                    <td> <?php echo $data['password']; ?>  </td>
                    <td style="text-align: center;">  <div class="form-group form-check">
                          <input  type="checkbox" value="<?php echo $data['usn']; ?>"class="form-check-input" name="usn[]">
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
          echo '<h6> No Accounts Left </h6> <br>';
        }
        ?>
        <div class="text-center">
          <button type="submit" class="btn btn-warning btn-lg " onclick="return confirm('Are you sure you want to Block the user?')" name="submit1">Block Account</button>&nbsp&nbsp&nbsp
          <button type="submit" class="btn btn-danger btn-lg " onclick="return confirm('Are you sure you want to Delete the user?')"name="submit2">Delete Account</button>
        </div>
       </form>
      </div>
    </main>
  </div>
</div>
</body>
</html>
