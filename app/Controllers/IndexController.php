<?php

namespace App\Controllers;

class IndexController extends BaseController
{
  public function IndexAction()
  {
    $data = array('message' => 'Hola mundo');
    $this->renderHTML('../views/index_view.php', $data);
  }
  public function SaludoAction()
  {
    $url = $_SERVER['REQUEST_URI'];
    $path = parse_url($url, PHP_URL_PATH);
    $segments = explode('/', rtrim($path, '/'));
    $nombre = end($segments);
    $data = array('message' => 'Saludos...' . $nombre);
    $this->renderHTML('../views/saludo_view.php', $data);
  }
}
