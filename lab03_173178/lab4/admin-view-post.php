<?php 
    include_once("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div class="container">
        <div class="nav">
            <ul>
                <li><a href="index.php">Public View</a></li>
                <li><a href="admin-view-post.php">Admin View</a></li>
                <li><a href="create-post.php">Create-Post</a></li>
            </ul>
        </div>
        <h1>Admin Preview Posts</h1>
        <table>
            <tr>
                <th>News id</th>
                <th>Date</th>
                <th>News title</th>
                <th>News Article</th>
                <th>Comments</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php 
                $view_sql = "SELECT * FROM news";
                $querry = $conn->query($view_sql);
                $row = $querry->fetchAll(PDO::FETCH_OBJ);

                foreach($row as $data):
            ?>
                <?php 
                    $search_id = $data->news_id;
                    $comments_sql = "SELECT * FROM comments WHERE news_id=$search_id AND approved=0";
                    $comments_query = $conn->query($comments_sql);
                    $num_comments = $comments_query->rowCount();
                ?>
                <tr>
                    <td><?= $data->news_id; ?></td>
                    <td><?= $data->date;?></td>
                    <td><?= $data->news_title;?></td>
                    <td><?= $data->full_text;?></td>
                    <td><a href="admin-new-comments.php?news_id=<?=$data->news_id;?>">New Comments(<?= $num_comments;?>)</a></td>
                    <td><a href="admin-edit-post.php?news_id=<?=$data->news_id;?>">Edit<a></td><td><a href="admin-delete-post.php?news_id=<?=$data->news_id;?>">Delete<a></td>
                    
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</body>
</html>