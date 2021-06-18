
<?php

session_start();

require 'validation.php';


header('X-FRAME-OPTIONS:DENY');

if(!empty($_POST)){
    echo '<pre>';
    var_dump($_POST);
    echo  '</pre>' ;
}


$pageFlag = 0;
$errors = validation($_POST);

if(!empty($_POST['btn_confirm']) && empty($errors)){
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
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
<link rel ="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.css">
<style>

</style>
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

    <?php if(!empty($errors) && !empty($_POST['btn_confirm'])) : ?>
        <?php echo '<ul>' ;?>
        <?php
            foreach($errors as $error) {
                echo '<li>'.$error.'</li>' ;
            } 
            ?>
       <?php echo '</ul>' ;?>
        
    <?php endif ; ?>
<form method="POST" action="login.php" >
お名前
<input type="text" name="your_name" value="<?php if(!empty($_POST['your_name'])){echo h($_POST['your_name']);}?>">
<br>
メールアドレス
<input type="email" name="email" value="<?php if(!empty($_POST['email'])){echo h($_POST['email']);}?>">
<br>
ホームページ
<input type="url" name="url" value="<?php if(!empty($_POST['url'])){echo h($_POST['url']);}?>">
<br>
性別
<input type="radio" name="gender" value="0"
<?php if(!empty($_POST['gender']) && $_POST['gender'] === '0')
{echo 'checked';}
?>>男性<!-- 男性のボタンチェック保持ができていない-->
<input type="radio" name="gender" value="1"
<?php if(!empty($_POST['gender']) && $_POST['gender'] === '1')
{echo 'checked';}
?>>女性
<br>
年齢
<select name="age" >
<option value="">選択してください</option>
<option value="1"
<?php if(!empty($_POST['age']) && $_POST['age'] === '1')
{echo 'selected';}
?>>~19歳</option>
<option value="2"
<?php if(!empty($_POST['age']) && $_POST['age'] === '2')
{echo 'selected';}
?>>20~29歳</option>
<option value="3"
<?php if(!empty($_POST['age']) && $_POST['age'] === '3')
{echo 'selected';}
?>>30~39歳</option>
<option value="4"
<?php if(!empty($_POST['age']) && $_POST['age'] === '4')
{echo 'selected';}
?>>40~49歳</option>
<option value="5"
<?php if(!empty($_POST['age']) && $_POST['age'] === '5')
{echo 'selected';}
?>>50~59歳</option>
<option value="6"
<?php if(!empty($_POST['age']) && $_POST['age'] === '6')
{echo 'selected';}
?>>60歳~</option>
</select>
<br>
お問い合わせ
<textarea name="contact">
<?php if(!empty($_POST['contact'])){echo h($_POST['contact']);}?>
</textarea>
<br>
<input type="checkbox" name="caution" value="1">注意事項にチェックする
<br>
<input type="submit" name="btn_confirm" value="確認する">
<input type="hidden" name="csrf" value="<?php echo $token; ?>">
</form>
<?php endif ;?>



<?php if($pageFlag === 1 ) : ?>
<!--入力した確認画面-->
<?php if($_POST['csrf'] === $_SESSION['csrfToken']) :?>
    <form method="POST" action="login.php" >
お名前
<?php echo h($_POST['your_name']); ?>
<br>
メールアドレス
<?php echo h($_POST['email']);?>
<br>
ホームページ
<?php echo h($_POST['url']);?>
<br>
<?php if($_POST['gender'] === '0')echo '男性';?>
<?php if($_POST['gender'] === '1')echo '女性';?>

<br>
年齢
<?php if ($_POST['age'] === '1'){echo '~19歳';}
elseif(  $_POST['age'] === '2'){echo '20~29歳';}
elseif(  $_POST['age'] === '3'){echo '30~39歳';}
elseif(  $_POST['age'] === '4'){echo '40~49歳';}
elseif(  $_POST['age'] === '5'){echo '50~59歳';}
elseif(  $_POST['age'] === '6'){echo '60歳~';}
?>
<br>
<?php echo h($_POST['contact'])?>
<br>

<input type="submit" name="back" value="戻る">
<input type="submit" name="btn_submit" value="送信する">
<input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']) ;?>">
<input type="hidden" name="email" value="<?php echo h($_POST['email']) ;?>">
<input type="hidden" name="url" value="<?php echo h($_POST['url']) ;?>">
<input type="hidden" name="gender" value="<?php echo h($_POST['gender']) ;?>">
<input type="hidden" name="age" value="<?php echo h($_POST['age']) ;?>">
<input type="hidden" name="contact" value="<?php echo h($_POST['contact']) ;?>">
<input type="hidden" name="csrf" value="<?php echo h($_POST['csrf']); ?>">
</form>
<?php endif;?>
<?php endif;?>


<?php if($pageFlag === 2 ) : ?>
<!--送信完了画面-->
    <?php if($_POST['csrf'] === $_SESSION['csrfToken']) :?>
完了画面

<?php unset($_SESSION['csrfToken']);?>
<?php endif;?>
<?php endif;?>

</body>
</html>







