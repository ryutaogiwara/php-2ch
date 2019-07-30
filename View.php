<?php
class View
{
  public function rend()
  {

    // ob_start,ob_get_cleanはセットで使うことで出力のタイミングを任意に調整できる（間に処理を入れることができる）
    ob_start();
    require('Board.php');
    $html = ob_get_clean();

    header('HTTP/1.0 404 Not Found');

    // ビュー出力
    echo $html;
  }
}
