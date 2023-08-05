<?php 
include '../includes/connect.php';
$id = $_GET['pcid'];
if(isset($_GET['pcid'])){
    $sql = "DELETE FROM `comments` WHERE id=$id";
    $query = mysqli_query($con,$sql);
    header('location:../index.php');
}
?>