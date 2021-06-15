
<?php

session_start();

header('X-FRAME-OPTIONS:DENY');

if(!empty($_SESSION)){
    echo '<pre>';
    var_dump($_SESSION);
    echo  '</pre>' ;
}


$pageFlag = 0;

if(!empty($_POST['btn_confirm'])){
    $pageFlag = 1;
}
if(!empty($_POST['btn_submit'])){
    $pageFlag = 2;
}

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
</head>
<body>




<?php if($pageFlag === 0 ) : ?>
<?php
if(!isset($_SESSION['csrfToken'])){
$csrfToken = bin2hex(random_bytes(32)); 
$_SESSION['csrfToken'] = $csrfToken;
}
$token = $_SESSION['csrfToken'];
    ?>
<form method="POST" action="login.php" >
メールアドレス
<input type="email" name="email" value="<?php if(!empty($_POST['email'])){echo h($_POST['email']);}?>">
<br>
パスワード
<input type="text" name="password" value="<?php if(!empty($_POST['password'])){echo h($_POST['password']);}?>">
<br>
<input type="submit" name="btn_confirm" value="確認する">
<input type="hidden" name="csrf" value="<?php echo $token; ?>">
</form>
<?php endif;?>

<?php if($pageFlag === 1 ) : ?>
<?php if($_POST['csrf'] === $_SESSION['csrfToken']) :?>
    <form method="POST" action="login.php" >
メールアドレス
<?php echo h($_POST['email']); ?>
<br>
パスワード
<?php echo h($_POST['password']);?>
<br>
<input type="submit" name="back" value="戻る">
<input type="submit" name="btn_submit" value="送信する">
<input type="hidden" name="email" value="<?php echo h($_POST['email']) ;?>">
<input type="hidden" name="password" value="<?php echo h($_POST['password']) ;?>">
<input type="hidden" name="csrf" value="<?php echo h($_POST['csrf']);?>">
</form>
<?php endif;?>
<?php endif;?>


<?php if($pageFlag === 2 ) : ?>
    <?php if($_POST['csrf'] === $_SESSION['csrfToken']) :?>
完了画面

<?php unset($_SESSION['csrfToken']);?>
<?php endif;?>
<?php endif;?>

</body>
</html>







