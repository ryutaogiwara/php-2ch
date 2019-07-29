<?php
// 各ファイル読み込み
require('Request.php');
require('View.php');

// クラスとはデータの設計図のようなもの。
// そのままでは使うことはできず、メソッドを使うことで取り出すことができる
class App
{
  // ③両private関数のプロパティに②のインスタンス変数がセットされる
  // インスタンスがセットされたことでこのprivate関数はAppクラス内のどこでも使える
  private $request;
  private $view;

  // ②それぞれインスタンス化する
  private function initialize()
  {
    $this->request = new Request;
    $this->view    = new View;
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

    // ルーティングパスの取得
    $path_info = $this->getPathInfo();
    $action = $this->split($path_info);

    if (isset($action[1]) && $action[1] === '') {
      // ⑤ビューのレンダリング
      $this->view->rend();
    } elseif ($action[1] === 'post') {
      echo 'post';
    } else {
      echo 'page404';
    }
  }
}
