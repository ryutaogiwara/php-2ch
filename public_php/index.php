<?php

// 実際に表示する内容はApp.php内で行われた処理の結果となる
require('../App.php');

// Appクラスのインスタンス化
$app = new App;

// インスタンス化することでrunメソッドを実行できる
$app->run();
