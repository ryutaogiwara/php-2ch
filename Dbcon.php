<?php
class Dbcon
{
  public function dbConnect()
  {
    // ドライバ呼び出しを使用して MySQL データベースに接続します
    $dsn = 'mysql:dbname=2ch_db; host=localhost:8889';
    $user = 'root';
    $password = 'root';

    try {
      $dbh = new PDO($dsn, $user, $password);
      // echo "接続成功\n";
    } catch (PDOException $e) {
      echo "接続失敗: " . $e->getMessage() . "\n";
      exit();
    }

    // $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET 'utef8'");
    // $pdo = new PDO('mysql:dbname=2ch_db; host=localhost:8889', 'root', 'root', $options);

    $user_name = '確認';
    $body = 'テスト';

    $sql = "INSERT INTO threads(user_name, body) VALUES(:user_name, :body)";
    $stmt = $dbh->prepare($sql);



    $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
    $stmt->bindParam(':body', $body, PDO::PARAM_STR);



    var_dump($stmt);

    $stmt->execute();
  }
}
