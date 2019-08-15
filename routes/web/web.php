<?php
//Вставка кода из других файлов в этой же папке
requireOnce(__DIR__);

function requireOnce($path)
{

  $path .= '/*';
  foreach (glob($path) as $router_files) {

    if (basename($router_files == 'web.php')) {
      continue; //Собственно этот файл и пути к папкам не вставляем
    }
    if (is_dir($router_files)) {
      requireOnce($router_files); //Собственно этот файл и пути к папкам не вставляем
      continue;
    }
    require_once $router_files; //Вставляем сюда все файлы из папки routes/web
  }
}