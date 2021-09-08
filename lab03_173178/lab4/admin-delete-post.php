<?php 
include_once("database.php");

$id = $_GET["news_id"];
$delete = "DELETE FROM news WHERE news_id=:id";
$stmt = $conn->prepare($delete);
$stmt->execute([':id' => $id ]);

header("Location: /admin-view-post.php");