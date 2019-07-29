<?php
class Request
{
  private function getBaseUrl()
  {
    // index.phpまでのfileパス
    $script_name = $_SERVER['SCRIPT_NAME'];
    // 実際のurl
    $request_uri = $_SERVER['REQUEST_URI'];

    // echo ('<div style= "color: green;">スクリプトネーム' . $script_name . '</div>');
    // echo ('<div style= "color: red;">リクエストURI' . $request_uri . '</div>');

    // index.phpが含まれている場合
    if (0 === strpos($request_uri, $script_name)) {
      return $script_name;
    }
    return '';
  }

  // パスインフォの取得
  public function getPathInfo()
  {
    // index.phpまたは空文字
    $base_url = $this->getBaseUrl();
    // echo ('<div style= "color: blue;">ベースURI' . $base_url . '</div>');

    // 実際のurl
    $request_uri = $_SERVER['REQUEST_URI'];
    // echo ('<div style= "color: red;">リクエストURI' . $request_uri . '</div>');


    // getパラメータがある場合
    if (false !== ($pos = strpos($request_uri, '?'))) {
      // var_dump($pos);
      $request_uri = substr($request_uri, 0, $pos);
    }

    $path_info = (string) substr($request_uri, strlen($base_url));
    // echo ('<div style= "color: gray;">パスインフォ' . $path_info . '</div>');

    return $path_info;
  }
}
