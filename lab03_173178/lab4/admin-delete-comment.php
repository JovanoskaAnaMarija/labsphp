<?php
include_once("database.php");
$id = $_GET["comment_id"];
$delete_comment = "DELETE FROM comments WHERE comment_id=:comment_id";
$delete_stmt=$conn->prepare($delete_comment);
$delete_stmt->execute([":comment_id"=>$id]);

header("Location: /admin-new-comments.php");

