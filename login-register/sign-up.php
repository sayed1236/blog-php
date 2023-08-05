<?php
    include '../includes/connect.php';
    session_start();

   if($_SERVER['REQUEST_METHOD']=='POST'){
    //   $name = $_POST['name'];
      $name = validate( $_POST['name']);
      $email = validate($_POST['email']);

      $password = validate($_POST['password']);
     
      $sql = "SELECT * FROM  `users` WHERE email='$email'";
      $result = mysqli_query($con,$sql);
      $data=mysqli_fetch_array($result);
      if($result){
        $num = mysqli_num_rows($result);
        if($num>0){
            echo 'user already used!!!';
        }else{
           $sql  = "insert into `users`(name,email,password) values('$name','$email','$password')";
           $result = mysqli_query($con,$sql);
           if($result){
            $_SESSION["login"] = "ok";

           $_SESSION['name']=$name;



            echo 'sign up successfully';
      
           header('location:../index.php');
            
           }else{
            die(mysqli_error($con));
           }

        }

      }


   }
   function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
                    <a class="btn btn-primary" href="login.php"> Back To login</a>
                </div>
            </div>
        </div>
      
        <form action="" method="POST" enctype="multipart/form-data">
   
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> name:</strong>
                        <input type="text" name="name" value="" class="form-control" placeholder=" Email">
                      
                    </div>
                </div>
               
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
               
                <!-- <div class="col-xs-12 col-sm-12 col-md-12">

<div class="form-group">
<strong> photo</strong>
<input type="file" id="file" name="file">
<span class="file-custom"></span>
</div>
</div> -->
                <button type="submit" name="register" class="btn btn-primary ml-3">Add</button>
            </div>
        </form>
    </div>
</body>

</html>