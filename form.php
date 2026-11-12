<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Keepsake - 記録する</title>
</head>
<body>
  <h1>記録する</h1>
  <form action="save.php" method="post">
    <p>タイトル<br><input type="text" name="title" required></p>
    <p>感想<br><textarea name="note" rows="6" cols="40" required></textarea></p>
    <button type="submit">保存</button>
  </form>
  <p><a href="list.php">一覧に戻る</a></p>
</body>
</html>