<?php

    include_once("database.php");
    $view_sql = "SELECT * FROM news";
    $querry = $conn->query($view_sql);
    $row = $querry->fetchAll(PDO::FETCH_OBJ);
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
        <div class="posts">
            <?php foreach($row as $data): ?>
                <div class="post-wrapper">
                    <div class="post-wrapper">
                        <div class="post">
                            <h2><?= $data->news_title ?></h2>
                            <p><?= $data->full_text?></p>
                        </div>
                    </div>
                </div>
                <?php 
                    $comments_id=$data->news_id;
                    $comments_sql = "SELECT * FROM comments WHERE news_id=$comments_id AND approved=1";
                    $comments_query = $conn->query($comments_sql);
                    $comments_row = $comments_query->fetchAll(PDO::FETCH_OBJ);
                ?>
                <div class="comments">
                    <h3>Comments:</h3>
                    <?php foreach($comments_row as $comment): ?>
                        <div class="comment">
                            <h4>Author: <?= $comment->author; ?></h4>
                            <p>Comment: <?= $comment->comment;?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <form action="" method="POST">
                    <div class="input-group">
                        <label for="naslov">Avtor</label>
                        <input type="text" id="author" name="author">
                    </div>
                    <div class="input-group">
                        <label for="comment">Komentar</label>
                        <textarea type="text" id="comment" name="comment"></textarea>        
                    </div>
                    <input type="hidden" name="submitted" value="submitted">
                    <input type="submit">
                </form>
                <?php
                    $author = "";
                    $comment = "";

                    if(!empty($_POST["submitted"])){
                        if(!empty($_POST["author"]) && !empty($_POST["comment"])){
                            $author = $_POST["author"];
                            $comment = $_POST["comment"];
                            $insert_comment = 'INSERT INTO comments (comment_id, news_id, author, comment, approved) VALUES (NULL,:news_id,:author,:comment,:approved)';
                            $insert_stmt = $conn->prepare($insert_comment);
                            $insert_stmt->execute([':news_id'=>$comments_id,':author'=>$author,':comment'=>$comment,":approved"=>0]);
                        }
                    }
                    
                ?>
        <?php endforeach; ?>
        </div>
    </div>
</body>
</html>

