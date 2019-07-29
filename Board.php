<html>

<head>

</head>

<body>
  <h1>2ch</h1>
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
