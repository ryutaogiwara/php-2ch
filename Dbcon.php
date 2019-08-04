<?php
class Dbcon
{
  public function dbConnect()
  {
    // ドライバ呼び出しを使用して MySQL データベースに接続
    $dsn = 'mysql:dbname=2ch_db; host=localhost:8889';
    $user = 'root';
    $password = 'root';
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET CHARACTER SET 'utf8'");
    $dbh = new PDO($dsn, $user, $password, $options);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
  }
    
  public function postThread()
  {
    // 条件分岐ー成功時の処理
    try {
      $user_name = 'user';
      $body = 'body';

      $sql = "INSERT INTO threads(user_name, body) VALUES(:user_name, :body)";
      $stmt = $dbh->prepare($sql);

      $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
      $stmt->bindParam(':body', $body, PDO::PARAM_STR);
      // var_dump($stmt);

      // $stmtの実行
      $stmt->execute();

    // 失敗時の処理
    } catch (PDOException $e) {
      echo "接続失敗: " . $e->getMessage() . "\n";
      exit();
    }

    // $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET 'utef8'");
    // $pdo = new PDO('mysql:dbname=2ch_db; host=localhost:8889', 'root', 'root', $options);

  }
}
