<?php
session_start();
$mail = $_SESSION['mail'];

if (isset($_SESSION['mail'])) {//ログインしているとき
    $msg = 'こんにちは' . htmlspecialchars($mail, \ENT_QUOTES, 'UTF-8') . 'さん';
    $link = '<a href="90-logout.php">ログアウト</a>';
} else {//ログインしていない時
    $msg = 'ログインしていません';
    $link = '<a href="20-login_input.php">ログイン</a>';
} 
?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>sleeping together(index画面)</title>
</head>

<body>
  <h1>sleeping togetherへようこそ</h1>
  <p><?php echo $msg; ?></p>
  <?php echo $link; ?>

</body>

</html>