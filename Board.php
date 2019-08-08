<html>

<head>

</head>

<body>
  <h1>2ch</h1>
  <div>
    <form action="http://localhost:8002/post" method="post">
      <div>
        <label for="user_name">投稿者：</label><br>
        <textarea id="text" name="user_name" cols="20" rows="1" maxlength="20" placeholder="名無しさん"></textarea>
      </div>
      <div>
        <label for="body">投稿内容：</label><br>
        <textarea id="text" name="body" cols="50" rows="6" maxlength="255" placeholder="投稿内容（必須）"></textarea>
      </div>
      <p><input type="submit" value="送信"></p>
    </form>
  </div>
  <div>
    <!-- 配列の入れ子構造になっているためthreads as thread が必要 -->
    <!-- 開始タグはコロン。閉じタグはセミコロン。 -->
    <?php foreach ($threads as $thread) : ?>
      <div><?php echo $thread['id'] ?></div>
      <div><?php echo $thread['user_name'] ?></div>
      <div><?php echo $thread['body'] ?></div>
      <br>
    <?php endforeach; ?>
  </div>
</body>

</html>
