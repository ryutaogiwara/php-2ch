<?php
class App
{
  public function run()
  {
    require('Data.php');
    $data = new Data;

    $threads = $data->getThreads();

    ob_start();
    require('Board.php');
    $html = ob_get_clean();

    echo $html;
  }
}
