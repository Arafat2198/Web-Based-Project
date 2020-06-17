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
     $semester = $_POST['semester'];
     $class = $_POST['class'];
     $usn = $_POST['usn'];
     $password = $_POST['password'];

     if($name=="" || $branch=="" ||$semester=="" ||$class=="" ||$usn=="" ||$password=="" )
       {
         echo "<script>alert('Please enter all the fields before Proceeding !!');</script>";
       }

     else
       {
         $query = "SELECT usn from student where (usn='$usn') limit 1;";
         $result = mysqli_query($link,$query);

         if(mysqli_num_rows($result) > 0)
           {
             echo "<script>alert(' Id already exist with another account. Please try with other  id');</script>";
           }
         else
           {
             $query = "INSERT  INTO student (name,branch,semester,usn,password,class)
             values ('$name','$branch','$semester','$usn','$password','$class');";

             $result=mysqli_query($link,$query);
             if(!$result)
               {
                 echo "<script>alert('There has been an error please try again later !!);</script>";
                 die();
               }
             else
               {
                 echo "<script>alert('Account Created Succesful');</script>";
                 header("location:http://localhost/project/Front_end/Login/Student%20Login/login_student.php");
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
background-image: url('OS-3.jpg');
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
    <h1 class="display-5"> <b>Sign-Up Page for Students</b> </h1>
      <p class="lead">Make Sure you Enter the Correct Details as it will be Verified</p>
        <hr class="my-4">
          <form method="Post">
                  <div class="form-group">
                    <label for="exampleInputEmail1"> <b>Name</b> </label>
                    <input type="text" name="name" class="form-control" aria-describedby="emailHelp">
                  </div>

                  <div class="form-group">
                    <label for="tg1"> <b>Branch</b></label>
                      <select class="form-control form-control-lg" id="tg1" name="branch" placeholder="Select">
                        <option value="">Choose...</option>
                        <option value="CSE">Computer Science Engineering</option>
                        <option value="ECE">Electronics and Communication Engineering</option>
                        <option value="EEE">Electrical engineering</option>
                        <option value="ME">Mechanical Engineering</option>
                        <option value="CV">Civil Engineering</option>
                        <option value="AE">Aeronautical Engineering</option>
                        <option value="AGE">Agricultural engineering</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="tg1"> <b>Semester</b></label>
                        <select class="form-control form-control-lg" id="tg1" name="semester" placeholder="Select">
                          <option value="">Choose...</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="tg1"> <b>Section</b></label>
                        <select class="form-control form-control-lg" id="tg1" name="class" placeholder="Select">
                          <option value="">Choose...</option>
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                          <option value="E">E</option>
                        </select>
                    </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1"> <b>USN</b> </label>
                    <input type="text" name= "usn" class="form-control" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1"> <b>Password</b> </label>
                    <input type="password" name="password" class="form-control validate" >
                  </div>

                  <div class="form-group form-check">
                  <button type="submit" class="btn btn-primary" name="submit">Register</button>
                  </div>
          </form>

  </div>
</div>
</body>
</html>
