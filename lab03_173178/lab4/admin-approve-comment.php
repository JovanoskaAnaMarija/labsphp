<?php
$id = $_GET["comment_id"];
include_once("database.php");

$approve_comment = "UPDATE comments SET approved=1 WHERE comment_id=:id";
$approve_comment_stmt = $conn->prepare($approve_comment);
$approve_comment_stmt->execute([":id"=>$id]);
header("Location: /admin-new-comments.php");