<?php 
    include_once("database.php");
    $id = $_GET["news_id"];
    if(!empty($id)){
        $not_approved_sql = "SELECT * FROM comments WHERE news_id=$id AND approved=0";
        $not_approved_query=$conn->query($not_approved_sql);
        $not_approved_comments = $not_approved_query->fetchAll(PDO::FETCH_OBJ);
    }else{
        header("Location: /admin-view-post.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div class="container">
    <table>
        <tr>
            <th>Comments Id</th>
            <th>News Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Delete</th>
            <th>Approve</th>
        </tr>
        <?php foreach($not_approved_comments as $data):?>
            <tr>
                <td><?= $data->comment_id; ?></td>
                <td><?= $data->news_id ?></td>
                <td><?= $data->author?></td>
                <td><?= $data->comment?></td>
                <td><a href="admin-delete-comment.php?comment_id=<?=$data->comment_id;?>">Delete Comment</a></td>
                <td><a href="admin-approve-comment.php?comment_id=<?=$data->comment_id;?>">Approve Comment</a></td>
            </tr>
        <?php endforeach;?>
    </table>

        <h2><a href="admin-view-post.php"><< Back</a></h2>
    </div>
</body>
</html>