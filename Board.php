<html>

<head>

</head>

<body>
  <h1>2ch</h1>
  <div>
    <form action="http://localhost:8002/post" method="post">
      <div>
        <label for="user_name">投稿者：</label><br>
        <textarea id="text" name="user_name" cols="20" rows="1" maxlength="20" placeholder="投降者名"></textarea>
      </div>
      <div>
        <label for="body">投稿内容：</label><br>
        <textarea id="text" name="body" cols="50" rows="6" maxlength="255" placeholder="投稿内容"></textarea>
      </div>
      <p><input type="submit" value="送信"></p>
    </form>
  </div>
  <?php
  for ($i = 0; $i < count($threads); $i += 1) {
    if ($i % 3 === 0) {
      echo '<div>' . $threads[$i]['id'] . '</div>';
      echo '<div style="color:blue;">' . $threads[$i]['name'] . '</div>';
      echo '<div>' . $threads[$i]['body'] . '</div>';
      echo '</br>';
    } else {
      echo '<div>' . $threads[$i]['id'] . '</div>';
      echo '<div style="color:blue;">' . $threads[$i]['name'] . '</div>';
      echo '<div>' . $threads[$i]['body'] . '</div>';
      echo '</br>';
    }
  }
  ?>
</body>

</html>
