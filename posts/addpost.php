<?php
session_start();

// if(!(isset($_SESSION["login"]) && $_SESSION["login"]=="ok")){
//     header('location:../login-register/login.php');
//     exit;
// }
include '../includes/connect.php';
// echo get_current_user_id();
if($_SERVER['REQUEST_METHOD']=='POST') {
    //   $name = $_POST['name'];
    $title = validate($_POST['title']);
    $discribtion = validate($_POST['discribtion']);
    $userid = $_SESSION['user_id'];
    $file = $_FILES['file'];
    $filename = $file['name'];
    $tmpname = $file['tmp_name'];




    $sql  = "insert into `posts`(title,discribtion,user_id,photo) values('$title','$discribtion','$userid','$filename')";
    $result = mysqli_query($con, $sql);
    if($result){
        mkdir("photos");
        move_uploaded_file($tmpname,"photos/$filename");
        // echo ' completed !!!!';
        header('location:../index.php');
    }else{
        die(mysqli_error($con));
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

<form action="" method="POST" enctype="multipart/form-data">
   
   <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group">
               <strong> title:</strong>
               <input type="text" name="title" value="" class="form-control" placeholder=" Name">
            
           </div>
       </div>
      
       <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group">
               <strong> discribtion:</strong>
               <input type="text" name="discribtion" value="" class="form-control" placeholder=" discribtion">
             
           </div>
       </div>
  
      
       <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">
              <strong> photo</strong>
              <input type="file" id="file" name="file">
              <span class="file-custom"></span>
              </div>
            </div>   
              
<button type="submit" name="register" class="btn btn-primary ml-3">Add</button>

   </div>
</form>
    </div>




</body>

</html>