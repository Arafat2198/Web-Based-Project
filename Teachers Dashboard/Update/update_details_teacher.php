<?php
   session_start();
   $link = mysqli_connect("localhost","root","","student_portal");
   if (mysqli_connect_error())
   {
     echo "Failed to connect to MySQL: ". mysqli_connect_error();
   }

   if(isset($_POST['submit']))
   {
        $name = $_POST['name'];
        $branch = $_POST['branch'];
        $post = $_POST['post'];
        $email = $_POST['email'];
        $empid = $_SESSION['id'];


       if ($name=="" || $branch==""|| $post==""|| $email=="")
       {
         echo " <script>alert('Please enter All the details before Proceeding !!');</script>";
       }
       else
       {
         $query = "UPDATE teacher SET name='$name',branch='$branch',post='$post',email='$email'  WHERE empid='$empid';";
         $result = mysqli_query($link, $query);

         if(!$result)
           {
             echo "<script>alert('There has been an error please try again later !!);</script>";
           }
         else
           {
             echo "<script>alert('Update Succesfull !!)</script>";
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
      <a href="http://localhost/project/Front_End/Logout/logout.php" class="btn btn-primary my-2"> <strong>LOG out</strong> </a>
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
              <strong style="font-size:20px" >Dashboard</strong>
            </a>
          </li>

        </ul>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <br>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2" style="text-align:center"><strong>Update form</strong></h1>
      </div>
      <form method="post">

        <div class="form-group">
          <label for="exampleInputPassword1">Name</label>
          <input type="text" class="form-control" name="name" placeholder="Name">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Branch</label>
          <input type="text" class="form-control" name="branch" placeholder="Branch">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Post Held</label>
          <input type="text" class="form-control" name="post" placeholder="Post Held">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Email</label>
          <input type="email" id="exampleInputEmail1" aria-describedby="emailHelp"class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group form-check">
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
      </div>
      </form>

    </main>
  </div>
</div>
</body>
</html>
