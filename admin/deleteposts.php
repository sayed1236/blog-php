<?php 
include '../includes/connect.php ';
$post_id = $_GET['pcid'];
if(isset($_GET['pcid'])){
    $sql = "DELETE FROM `comments` WHERE post_id='$post_id'";
    $ifdeletecomment = mysqli_query($con,$sql);
    $sql2 = "DELETE FROM `posts` WHERE post_id='$post_id'";
    $ifdeletepost = mysqli_query($con,$sql2);
    if($sql && $sql2){
        echo 'deleted';
    }else{
        echo 'error';
    }

    header('location:display.php');
    
}
?>