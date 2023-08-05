<?php
include 'includes/connect.php';

session_start();

// (isset($_SESSION["login"]))

if((isset($_SESSION["login"])) && $_SESSION["login"]=="ok") {
    echo 'hello from session';
}


function displaycomments($parent_id=0, $post_id, $user_id ) {

    global $con;
    $sqll = "SELECT * FROM `comments` WHERE post_id=$post_id and parent_id=$parent_id ";
    $check= mysqli_query($con,$sqll);
    // $sa=mysqli_num_rows($check);
    


    if(mysqli_num_rows($check)>0){

        while($data=mysqli_fetch_assoc($check)){
            echo '<div class="comment-container" style="margin-left:20px"';
            echo '<p style="color:blue;"><strong>'.$data['user_id'].'</strong>'.$data['comment'].'</p>';
            displayComments($data['comment_id'],$post_id,$user_id);
            echo ' <form action="" method="POST" enctype="multipart/form-data">';
            echo '<input type="hidden" name="postid" value="'.$post_id.'" class="form-control">';
            echo '<input type="hidden" name="parent_id" value="'.$data['comment_id'].'" class="form-control">';
            echo '<div class="form-group reply-form">';
            echo '<label for="comment">reply:</label>';
            echo '<textarea class="form-control" id="comment" name="comment" row="2" required></textarea>';
            echo '</div>';
            echo '<button type="submit" name="register" class="btn btn-primary">submi reply </button>';
            echo '</form>';
            echo '</div>';



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

include 'includes/header.php';

?>
<?php
  if(isset($_POST['register']) && !empty($_SESSION['user_id']) ){
    $comment = $_POST['comment'];
    $comentby = $_SESSION['user_id'];
    $postparent = $_POST['postid'];
    $parent_id = $_POST['parent_id'];
    $statement = "INSERT INTO `comments` (user_id,post_id,comment,parent_id) values('$comentby',' $postparent',' $comment','$parent_id')";
    $qwe = mysqli_query($con,$statement);
    
    if($qwe){
        echo 'comment created';
    }

}
if(isset($_POST['deletepost']) ){
    $deletepostid = $_POST['post_id'];
    // $deletecommentid = $_POST['comment_id'];

    $deletecomment = "DELETE FROM `comments` WHERE post_id=$deletepostid";
    $ifdeletecomment = mysqli_query($con,$deletecomment);

    $deletepost = "DELETE FROM `posts` WHERE post_id=$deletepostid";

    $ifdeletepost = mysqli_query($con,$deletepost);

    if($ifdeletepost && $ifdeletecomment){
        echo 'post delete';
    }

    
}
if(isset($_POST['deletecomment']) ){
    $deletecommentid = $_POST['comment_id'];
    
    $delete = "DELETE FROM `comments` WHERE comment_id=$deletecommentid";

    $ifdelete = mysqli_query($con,$delete);
    if($ifdelete){
        echo 'comment delete';
    }

    
}
// $sql2 = "select * from posts join comments on posts.post_id=comments.post_id";
$sql = "select * from posts ";

$res= mysqli_query($con,$sql);
$numss=mysqli_num_rows($res);
if($numss>0){
    // $row=$res->fetch_assoc();
    // session_start();
//    echo $_SESSION['name'];
    while($row=mysqli_fetch_array($res)){
        echo '<div class="card " style="width:600px; margin: auto; margin-top: 20px;background-color:#0010 ">';
    echo '  <div class="card-body "> ';
    echo '<img src="posts/photos/'.$row['photo'].'" width="200px">';

    echo '    <h1 class="card-title">'.$row['title'].'</h1>';

    echo ' <form action="" method="POST" enctype="multipart/form-data">
   
       <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12">
               <div class="form-group">
                   <strong> comment:</strong>
                   <input type="text" name="comment" value="" class="form-control" placeholder="add comment" required>
                   <input type="hidden" name="postid" value="'.$row['post_id'].'" class="form-control" placeholder=" Email">

               </div>
           </div>
           
           <button type="submit" name="register" class="btn btn-primary ml-3">Add-comment</button>
       </div>
   </form>';
   $postid = $row['post_id'];
   $userid = $row['user_id'];

   displaycomments($parent_id =0, $postid,$userid );


   
   echo '<h6> comments: </h6>';
   echo '</div>';
          echo '</div>';
          echo '</div>';
   

      
//        $sql2 = "select * from `comments` where post_id='$postid'";
//        $res2= mysqli_query($con,$sql2);
//        $numss2=mysqli_num_rows($res2);
       
// if($numss>0) {
//     while($row2=mysqli_fetch_array($res2)) {
//         echo '<img src="posts/photos/'.$row['photo'].'" width="50px">';

//         echo $row2['comment'].'<br>';
//         $sql4 = "select user_id from `users` where user_id='$userid'";
//         $res4= mysqli_query($con, $sql4);
//         // getcomments();

//         if(!empty($_SESSION['user_id'])) {
//             if($row2['user_id']===$_SESSION['user_id']) {

//                 echo '<form action="" method="POST" enctype="multipart/form-data">
//             <input type="hidden" name="comment_id" value="'.$row2['comment_id'].'" class="form-control">
    
//             <button type="submit" name="deletecomment" class="btn btn-info ">delete</button>
//             </form>';
//             }

//         }
//     }
// }
//        $sql3 = "select user_id from `users` where user_id='$userid'";
//        $res3= mysqli_query($con,$sql3);
//        $numss3=mysqli_num_rows($res3);


//        if($numss3>0){

//         while($row3= mysqli_fetch_array($res3)) {
            
//            if(!empty($_SESSION['user_id'])){
//             if($row['user_id']===$_SESSION['user_id'] ) {
        
//                 echo '<form action="" method="POST" enctype="multipart/form-data">
                
//                 <input type="hidden" name="post_id" value="'.$row['post_id'].'" class="form-control">
        
//                 <button type="submit" class="btn btn-danger " name="deletepost">delete</button>
//                 </form>';
//             }
//            }
//         }
//        }
//         echo '</div>';
//        echo '</div>';
//        echo '</div>';




    


    }


}
?>
<?php
// $sql ="SELECT * FROM `posts` Join `comments`  ";
// $result = mysqli_query($con,$sql);
// $data=[];
// if($result){
//     while($row=mysqli_fetch_array($result)){
//         $data[]=$row;
        
//     }
    
// }
?>





</body>

</html>