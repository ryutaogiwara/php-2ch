<?php
class View
{
  private function escape($text)
  {
    return htmlspecialchars($text, ENT_QUOTES, 'utf-8');
  }
  // 他のクラスからも呼び出せる
  public function rend($fail_name, $threads = null )
  {
    // ob_start,ob_get_cleanはセットで使うことで出力のタイミングを任意に調整できる（間に処理を入れることができる）
    ob_start();
    // 任意のファイルを表示できるようにするために引数としてファイル名を変数で定義
    require($fail_name);
    $html = ob_get_clean();

    // ビュー出力
    echo $html;
  }
}
