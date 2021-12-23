<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>sleeping together(新規登録画面)</title>
</head>

<body>
  <h1>sleeping together</h1>
  <form action="register.php" method="POST">
    <fieldset>
      <legend>[新規会員登録]</legend>
      <div>
        ID: <input type="text" name="id" minlength="4" placeholder="4文字以上" required>
      </div>
      <div>
        PASSWORD: <input type="password" name="password" minlength="6" placeholder="6文字以上" required>
      </div>
      <div>
        <input type="submit" value="新規登録">
      </div>
    </fieldset>
  </form>

  <p>すでに登録済の方は <a href="login_input.php">こちら</a></p>

</body>

</html>