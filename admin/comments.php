
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
                <th> comment</th>
                <th> action</th>

                
            </tr>
        </thead>
        <tbody>
            <?php
            include '../includes/connect.php ';

            $post_id = $_GET['pcid'];

if(isset($_GET['pcid'])) {

    $sql = "select * from `comments` where post_id = '$post_id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_num_rows($result);
    if($row>0) {
        while($data = mysqli_fetch_assoc($result)) {
            echo '
                    <tr>
                    <td>'.$data['comment_id'].'</td>
                    <td>'.$data['comment'].'</td>
                    <td><a class="btn btn-outline-danger" href="deletecomment.php?pcid='.$data['comment_id'].'">delete</a>

                    </td>
                    </tr>
                    ';

        }
    }
}
             ?>

            
        </tbody>
    </table>
    
       
    </div>
</body>
</html> 