<?php 
include '../includes/connect.php ';
$id = $_GET['pcid'];
if(isset($_GET['pcid'])){
    $sql = "DELETE FROM `comments` WHERE comment_id=$id";
    $query = mysqli_query($con,$sql);
    header('location:display.php');
    
}
?>