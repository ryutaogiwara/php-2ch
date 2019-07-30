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
      // Board.phpを読み込むための処理
      // Data.phpの読み込み
      require('Data.php');
      // Dataクラス（処理）を一つの変数＄dataとして定義（インスタンス化）
      $data = new Data;
      // dataインスタンス内のgetTreadsメソッドを実行し結果を$threadsと定義
      $threads = $data->getThreads();

      // ⑤引数を置くことで対応するビューのレンダリング
      $this->view->rend();
    } elseif ($action[1] === 'post') {
      echo 'post';
    } else {
      // 404エラーページのレンダリング
      $this->view->rend();
    }
  }
}
