<?php

//var_dump($_POST);
//exit();

// POSTデータ確認
if (
  !isset($_POST['id']) || $_POST['id']==='' ||
  !isset($_POST['password']) || $_POST['password']===''
) {
  exit('ParamError');
}

session_start();
$id=$_POST['id'];

// DB接続
// 各種項目設定
$dbn ='mysql:dbname=ydev01_04_sleep;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// SQL呼び出し
$sql = 'SELECT * FROM  login_table WHERE id = :id';
$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$member = $stmt->fetch();

//指定したハッシュがパスワードにマッチしているかチェック
if (password_verify($_POST['password'], $member['password'])) {
    //DBのユーザー情報をセッションに保存
    $_SESSION['id'] = $member['id'];
    $msg = 'ログインしました。';
    $link = '<a href="welcome.php">ホーム</a>';
} else {
    $msg = 'メールアドレスもしくはパスワードが間違っています。';
    $link = '<a href="login_input.php">戻る</a>';
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>sleeping together(ログイン完了画面)</title>
</head>

<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>