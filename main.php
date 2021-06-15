<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>簡易掲示板</title>
</head>
<body>
    <h1>掲示板</h1>

    <form method="POST" action="main.php">
    名前を入力して下さい<br>
    <input type="text" name="your_name"><br><br>
    コメントを入力して下さい<br>
   <textarea name="comment"  cols="50" rows="5" ></textarea>
    <input type="submit" name="delete_btn" value="削除">
   <br>
   <input type="submit" name="comment_btn" value="投稿">
    </form>

<?php 

$your_name = $_POST['your_name'];
$comments = $_POST['comment'];

if(!empty($_POST['your_name'])){
echo $your_name;}
if(!empty($_POST['comment'])){
echo $comments;
}



?>
</body>
</html>