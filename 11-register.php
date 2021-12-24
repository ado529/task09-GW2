<?php

//var_dump($_POST);
//exit();

// POSTデータ確認
if (
  !isset($_POST['mail']) || $_POST['mail']==='' ||
  !isset($_POST['password']) || $_POST['password']===''
) {
  exit('ParamError');
}

//フォームからの値をそれぞれ変数に代入
$mail = $_POST['mail'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$dbn ='mysql:dbname=ydev01_04_sleep;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

//フォームに入力されたidがすでに登録されていないかチェック
//$sql = "SELECT * FROM users WHERE id = :id";
//$stmt = $dbh->prepare($sql);

//$stmt->bindValue(':id', $id);
//$stmt->execute();
//$member = $stmt->fetch();


//if ($member['mail'] === $mail) {
//    $msg = '同じメールアドレスが存在します。';
//    $link = '<a href="signup.php">戻る</a>';
//} else {
//    //登録されていなければinsert 
//    $sql = "INSERT INTO users(name, mail, pass) VALUES (:name, :mail, :pass)";
//    $stmt = $dbh->prepare($sql);
//    $stmt->bindValue(':name', $name);
//    $stmt->bindValue(':mail', $mail);
//    $stmt->bindValue(':pass', $pass);
//    $stmt->execute();
//    $msg = '会員登録が完了しました';
//    $link = '<a href="login.php">ログインページ</a>';
//}

// SQL作成&実行
$sql = 'INSERT INTO login_table (id, mail, password, created_at, updated_at,is_deleted) VALUES (NULL, :mail, :password, now(), now(),FALSE)';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header('Location:20-login_input.php');
exit();


?>

// <h1><?php echo $msg; ?></h1><!--メッセージの出力-->
// <?php echo $link; ?>