<?php 


include_once("database.php");
$naslov = "";
$statija = "";
$id = $_GET["news_id"];
$sql = 'SELECT * FROM news WHERE news_id=:id';
$statement = $conn->prepare($sql);
$statement->execute([':id' => $id ]);
$data = $statement->fetch(PDO::FETCH_ASSOC);
if(!empty($_POST["submitted"])){
    if(!empty($_POST["naslov"]) && !empty($_POST["statija"])){
        $naslov=$_POST["naslov"];
        $statija=$_POST["statija"];
        $edit_sql = "UPDATE news SET news_title = :naslov, full_text = :statija WHERE news_id = :id";
        $stmt=$conn->prepare($edit_sql);
        $stmt->execute([':naslov'=>$naslov,':statija'=>$statija,':id'=>$id]);
        header("Location: /admin-view-post.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
    <h1>Edit POST</h1>
    <form action="" method="POST">
        <div class="input-group">
            <label for="naslov">Naslov</label>
            <input type="text" id="naslov" name="naslov" value="<?= $data["news_title"]; ?>">
        </div>
        <div class="input-group">
            <label for="statija">Tekst</label>
            <textarea type="text" id="statija" name="statija"><?= $data["full_text"]; ?></textarea>       
        </div>
        <input type="hidden" name="submitted" value="submitted">
        <input type="submit">
    </form>
</body>
</html>