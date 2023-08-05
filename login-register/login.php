<?php
    include '../includes/connect.php';
    session_start();

   if($_SERVER['REQUEST_METHOD']=='POST'){
      
      $email = $_POST['email'];
      $password = $_POST['password'];
    
       
      $sql = "SELECT user_id FROM  `users` WHERE email='$email' and password='$password'";
      $result = mysqli_query($con,$sql);
      if($result){
        $num = mysqli_num_rows($result);
        if($num>0){
            $data=mysqli_fetch_array($result);
            $user_id=$data['user_id'];
            $_SESSION['user_id']=$user_id;
            header('location:../index.php');
            echo 'login successfully!!!!!';

           
        }else{
            echo 'username or password incorrect';
        }
      }
     


   }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employees</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

  <?php
  include '../includes/header.php';
  ?>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Employee</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="sign-up.php"> Back To sign-up<a>
                </div>
            </div>
        </div>
      
        <form action="" method="POST" enctype="multipart/form-data">
   
            <div class="row">
                
               
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> Email:</strong>
                        <input type="email" name="email" value="" class="form-control" placeholder=" Email">
                      
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> Password:</strong>
                        <input type="text" name="password" value="" class="form-control" placeholder=" password">
                      
                    </div>
                </div>
               
               
                <button type="submit" name="register" class="btn btn-primary ml-3">Add</button>
            </div>
        </form>
    </div>
</body>

</html>