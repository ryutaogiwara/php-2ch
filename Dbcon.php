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
    
  public function postThread($user_name, $body)
  {
    // 条件分岐ー成功時の処理
    try {
      $dbh = $this->dbConnect();

      // 投稿日時の設定
      $date = new DateTime();
      $date->setTimezone(new DateTimeZone('Asia/Tokyo'));
      $created_at = $date->format('Y-m-d H-i-s');

      $sql = "INSERT INTO threads(user_name, body, created_at) VALUES(:user_name, :body, :created_at)";
      $stmt = $dbh->prepare($sql);

      $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
      $stmt->bindParam(':body', $body, PDO::PARAM_STR);
      $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);
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

  public function getThreads()
  {
      $dbh = $this->dbConnect();
      $stmt = $dbh->prepare("select * from threads");
      // $stmtの実行
      $stmt->execute();
      // fetchAllした内容は配列の中に配列が格納された状態
      $res = $stmt->fetchAll();
      return $res;
  }
}
