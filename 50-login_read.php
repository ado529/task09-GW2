<?php

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


// SQL作成&実行

$sql = 'SELECT * FROM login_table';

$stmt = $pdo->prepare($sql);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result=$stmt->fetchALL(PDO::FETCH_ASSOC);

//echo'<pre>';
//var_dump($result);
//echo'</pre>';
//exit();

$output = "";
foreach ($result as $record) {
  $output .= "
    <tr>
      <td>{$record["mail"]}</td>
      <td>{$record["password"]}</td>
      <td>{$record["created_at"]}</td>
      <td>{$record["updated_at"]}</td>
      <td>{$record["is_deleted"]}</td>
    </tr>
  ";
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>管理画面(id,password一覧)</title>
</head>

<body>
  <fieldset>
    <legend>管理画面(id,password一覧)）</legend>
    <a href="20-login_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>mail</th>
          <th>password</th>
          <th>created_at</th>
          <th>updated_at</th>
          <th>is_deleted</th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>mail</td><td>password</td>・・・<tr>の形でデータが入る -->
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>