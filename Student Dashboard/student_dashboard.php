<?php

      session_start();
      $link = mysqli_connect("localhost","root","","student_portal");
      if (mysqli_connect_error())
      {
        echo "Failed to connect to MySQL: ". mysqli_connect_error();
      }
      $id = $_SESSION['id'];
      $query = "SELECT name from student where usn='$id'";
      $name  = mysqli_query($link, $query);
      $rows=mysqli_fetch_assoc($name);

 ?>
 <html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="flash.css">
  </head>
  <body>

 <header>
   <div class="collapse bg-dark" id="navbarHeader">
     <div class="container">
       <div class="row">
         <div class="col-sm-8 col-md-7 py-4">
           <h4 class="text-white">About</h4>
         </div>
         <div class="col-sm-4 offset-md-1 py-4">
           <h4 class="text-white">Contact</h4>
           <ul class="list-unstyled">
           </ul>
         </div>
       </div>
     </div>
   </div>
   <div class="navbar navbar-dark bg-dark shadow-sm">
     <div class="container d-flex justify-content-between">
       <a href="#" class="navbar-brand d-flex align-items-center">
         <img src="1200px-BMS_College_of_Engineering.svg.png" height="100%" width="5%" alt="">
       &nbsp&nbsp&nbsp&nbsp&nbsp BMS College of Engineering
       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
       &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
       Logged in as : &nbsp<strong> <?php echo $rows['name'];  ?></strong>
       </a>
     </div>
   </div>
 </header>

 <main role="main">

   <section class="jumbotron text-center">
     <div class="container">
       <h1 class="jumbotron-heading"><strong>STUDENT DASHBOARD</strong></h1>
       <p>
         <a  class="btn btn-lg btn-info my-2" href="http://localhost/project/Front_End/dashboard/Student%20Dashboard/Profile/profile_student.php">View Profile</a>
         <a href="http://localhost/project/Front_End/dashboard/Student%20Dashboard/Update/update_details.php" class="btn-lg btn btn-success  my-2">Update Profile</a>
         <br>
         <a  class="btn btn-lg btn-primary my-2" href="http://localhost/project/Front_End/Logout/logout.php">LOG out</a>
       </p>
       <br>
       <br>

       <p class="lead text-muted">View Any of the Three</p>
     </div>
   </section>

   <div class="album py-5 bg-light">
     <div class="container">

       <div class="row">
         <div class="col-md-4">
           <div class="card mb-4 shadow-sm">
             <img width="100%" height="300" background="#55595c" color="#eceeef" class="card-img-top" text="Thumbnail" src="844_office_employee_mman_performance_rating_statics_figures-512.png" alt="">
             <div class="card-body">
               <p class="card-text"><strong>Your Academic Results</strong></p>
               <div class="d-flex justify-content-between align-items-center">
                 <div class="btn-group">
                   <button type="button" class="btn btn-sm btn-outline-secondary"> <a href="http://localhost/project/Front_End/dashboard/Student%20Dashboard/academic_results/each_subject.php" > View</a></button>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="col-md-4">
           <div class="card mb-4 shadow-sm">
             <img src="5717_-_Update_Document-512.png" width="100%" height="300" background="#55595c" color="#eceeef" class="card-img-top" text="Thumbnail"alt="">
             <div class="card-body">
               <p class="card-text"><strong>Calculate SGPA</strong></p>
               <div class="d-flex justify-content-between align-items-center">
                 <div class="btn-group">
                   <button type="button" class="btn btn-sm btn-outline-secondary"> <a href="http://localhost/project/Front_End/dashboard/Student%20Dashboard/SGPA/SGPA_1.php" >View</a></button>
                 </div>
                 <small class="text-muted"></small>
               </div>
             </div>
           </div>
         </div>
         <div class="col-md-4">
           <div class="card mb-4 shadow-sm">
             <img src="user_idea_communication_feedback_comment_opinion-512.png" width="100%" height="300" background="#55595c" color="fff" class="card-img-top" text="Thumbnail" alt="">
             <div class="card-body">
               <p class="card-text"><strong>Teachers Feedback</strong></p>
               <div class="d-flex justify-content-between align-items-center">
                 <div class="btn-group">
                   <button type="button" class="btn btn-sm btn-outline-secondary"><a href="http://localhost/project/Front_End/dashboard/Student%20Dashboard/Teacchers%20Feedback/teacher%20Feedback.php" ">View</a></button>
                 </div>
                 <small class="text-muted"></small>
               </div>
             </div>
           </div>
         </div>


       </div>
     </div>
   </div>

 </main>

 <footer class="text-muted">
   <div class="container">
     <p class="float-right">
       <a href="#">Back to top</a>
     </p>
   </div>
 </footer>
  </body>
</html>
