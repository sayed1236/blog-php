<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employees</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
    </style>
</head>
<body style="background-color:bisque;">
    <div class="row"  >
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2 >Add store</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="user.php"> Add User </a>
            </div>
        </div>
    </div>
       
       
    <table class="table table-bordered" style="width:900px; margin:auto">
        <thead>
            <tr>
                <th>id</th>
                <th> title</th>
                <th> content</th>
                <th>comments</th>
                <th  >action</th>
                <th >photo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../includes/connect.php ';
            $sql = "SELECT * FROM `posts`";
            $query = mysqli_query($con,$sql);
            if($query){
                while( $row = mysqli_fetch_assoc($query) ){
                    echo '
                    <tr>
                    <td>'.$row['post_id'].'</td>
                    <td>'.$row['title'].'</td>
                    <td>'.$row['discribtion'].'</td>
                    <td><a href="comments.php?pcid='.$row['post_id'].'">comments</a></td>
                    <td><a class="btn btn-outline-danger" href="deleteposts.php?pcid='.$row['post_id'].'">delete</a>

                    </td>
                    <td ><img src="../posts/photos/'.$row['photo'].'" width="100px" ></td>                        
                    </tr>
                    ';

                }
            }
             ?>
            
        </tbody>
    </table>
    
       
    </div>
</body>
</html>