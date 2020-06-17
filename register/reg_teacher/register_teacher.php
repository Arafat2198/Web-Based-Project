<?php

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
     $empid = $_POST['empid'];
     $password = $_POST['password'];

     if($name=="" || $branch=="" ||$post=="" ||$email=="" ||$empid=="" ||$password=="" )
       {
         echo "<script>alert('Please enter all the fields before Proceeding !!');</script>";
       }

     else
       {
         $query = "SELECT empid from teacher where (empid='$empid') limit 1;";
         $result = mysqli_query($link,$query);

         if(mysqli_num_rows($result) > 0)
           {
             echo "<script>alert(' Id already exist with another account. Please try with other  id');</script>";
           }
         else
           {
             $query = "INSERT  INTO teacher(name,branch,post,empid,password,email)
             values ('$name','$branch','$post','$empid','$password','$email');";

             $result=mysqli_query($link,$query);
             if(!$result)
               {
                 echo "<script>alert('There has been an error please try again later !!);</script>";
                 die();
               }
             else
               {
                 echo "<script>alert('Account Created Succesful');</script>";
                 header("location:http://localhost/project/Front_end/Login/Teacher%20login/login_teacher.php");
               }
           }

       }
   }

?>


<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap.min.css">
<style media="screen">


body {
background-image: url('BMSCE_Classroom_Block.jpg');
background-repeat: no-repeat;
background-attachment: fixed;
background-size: cover;

}

.jumbotron{
  width: 600px;
  position: inherit;
  transition: 800ms;
  opacity: 0.97;
}
</style>
</head>
<body>
  <br>
  <br>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 offset-3 float-md-center">
  <div class="jumbotron">
    <h1 class="display-5"> <b>Sign-Up Page for Teachers</b> </h1>
    <p class="lead">Make Sure you Enter the Correct Details as it will be Verified</p>
    <hr class="my-4">
    <form method="Post">
      <div class="form-group">
        <label for="exampleInputEmail1"> <b>Name</b> </label>
        <input type="text" name="name"class="form-control" >
      </div>

      <div class="form-group">
        <label for="tg1"> <b>Branch</b></label>
          <select class="form-control form-control-lg" id="tg1" name="branch" placeholder="Select">
            <option value="">Choose...</option>
            <option value="branch">Computer Science Engineering</option>
            <option value="branch">Electronics and Communication Engineering</option>
            <option value="branch">Electrical engineering</option>
            <option value="branch">Mechanical Engineering</option>
            <option value="branch">Civil Engineering</option>
            <option value="branch">Aeronautical Engineering</option>
            <option value="branch">Agricultural engineering</option>
          </select>
        </div>

        <div class="form-group">
          <label for="tg1"><b>Post Held</b></label>
            <select class="form-control form-control-lg" id="tg1" name="post" placeholder="Select">
              <option value="">Choose...</option>
              <option value="post">Assistant Professor</option>
              <option value="post">Associate professor</option>
              <option value="post">Professor</option>
              <option value="post">Head Of Department</option>
            </select>
          </div>

      <div class="form-group">
        <label for="exampleInputEmail1"> <b>Email</b> </label>
        <input type="email" name="email"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1"> <b>Employee No</b> </label>
        <input type="text" name="empid"class="form-control" >
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1"> <b>Password</b> </label>
        <input type="password" name="password"class="form-control" id="exampleInputPassword1">
      </div>

      <div class="form-group form-check">
      <button type="submit" class="btn btn-primary" name="submit">Register</button>
      </div>

    </form>

  </div>
</div>
</body>
