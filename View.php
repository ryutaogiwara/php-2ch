<?php
class View
{
  public function rend()
  {
    // Data.phpの読み込み
    require('Data.php');
    // Dataクラス（処理）を一つの変数＄dataとして定義（インスタンス化）
    $data = new Data;
    // dataインスタンス内のgetTreadsメソッドを実行し結果を$threadsと定義
    $threads = $data->getThreads();

    // ob_start,ob_get_cleanはセットで使うことで出力のタイミングを任意に調整できる（間に処理を入れることができる）
    ob_start();
    require('Board.php');
    $html = ob_get_clean();

    echo $html;
  }
}