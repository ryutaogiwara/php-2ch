<html>

<head>

</head>

<body style="background-color:darkgray">
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
      <!-- エスケープ処理 $this->escape() View.php内にてescapeメソッドを定義-->
      <div>
        <span style="margin-right: 15px;"><?php echo $this->escape($thread['id']) ?></span>
        <span style="color:blue; margin-right:15px;"><?php echo $this->escape($thread['user_name']) ?></span>
        <span style="color:lime"><?php echo $this->escape($thread['created_at']) ?></span>
      </div>
      <div><?php echo $this->escape($thread['body']) ?></div>
      <br>
    <?php endforeach; ?>
  </div>
</body>

</html>
