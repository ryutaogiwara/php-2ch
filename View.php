<?php
class View
{
  // 他のクラスから
  public function rend($fail_name)
  {
    // ob_start,ob_get_cleanはセットで使うことで出力のタイミングを任意に調整できる（間に処理を入れることができる）
    ob_start();
    // 任意のファイルを表示できるようにするために引数としてファイル名を変数で定義
    require($fail_name);
    $html = ob_get_clean();

    header('HTTP/1.0 404 Not Found');

    // ビュー出力
    echo $html;
  }
}
