<?php
// 各ファイル読み込み
require('Request.php');
require('View.php');
require('Dbcon.php');

// クラスとはデータの設計図のようなもの。
// そのままでは使うことはできず、メソッドを使うことで取り出すことができる
class App
{
  // ③private関数のプロパティに②のインスタンス変数がセットされる
  // インスタンスがセットされたことでこのprivate関数はAppクラス内のどこでも使える
  private $request;
  private $view;
  private $dbcon;

  // ②それぞれインスタンス化する
  private function initialize()
  {
    $this->request = new Request;
    $this->view    = new View;
    $this->dbcon   = new Dbcon;
  }

  // getPathInfoメソッドの実行
  private function getPathInfo()
  {
    // ④ルーティング
    return $this->request->getPathInfo();
  }

  // パスインフォからパスを生成するメソッド
  private function split($path_info)
  {
    // explode関数により$path_infoの値を'/'ごとに分割
    return explode('/', $path_info);
  }

  // runメソッドを定義。
  public function run()
  {
    // ①initializeメソッドを呼び出す
    $this->initialize();
    // DbConnectメソッドを呼び出す
    $this->dbcon->dbConnect();

    // ルーティングパスの取得
    $path_info = $this->getPathInfo();
    $action = $this->split($path_info);

    if (isset($action[1]) && $action[1] === '') {
      // getThreadsメソッドから引き出したデータを$threadsに入れる
      $threads = $this->dbcon->getThreads();
      // ⑤引数を置くことで対応するビューのレンダリング
      // ビューの雛形であるBoard.phpに$threadsを代入指定いく
      $this->view->rend('Board.php', $threads);
    } elseif ($action[1] === 'post') {
      $user_name = $_POST['user_name'];
      // user_nameが空の場合、固定値を指定
      if (empty($user_name)) {
        $user_name = '名無しさん';
      }
      $body      = $_POST['body'];
      if (empty($body)) {
        header('Location: http://localhost:8002');
        exit;
      }
      $this->dbcon->postThread($user_name, $body);
      header('Location: http://localhost:8002');
    } else {
      // 404エラーページのレンダリング
      header('HTTP/1.0 404 Not Found');
      $this->view->rend('404Error.php');
    }
  }
}
