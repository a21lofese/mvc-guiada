<?php

namespace App\Controllers;

class Numeroscontroller extends BaseController
{
  public function NumerosAction()
  {
    $array = array(2, 4, 6, 8, 10, 12, 14, 16, 18, 20);
    $data = array('message' => $array);
    $this->renderHTML('../views/numeros_view.php', $data);
  }
  public function NumerosCantidadAction()
  {
    $url = $_SERVER['REQUEST_URI'];
    $path = parse_url($url, PHP_URL_PATH);
    $segments = explode('/', rtrim($path, '/'));
    $cantidad = end($segments);
    $array = array();
    $numero = 0;
    while (count($array) < $cantidad) {
      $numero++;
      if ($numero % 2 == 0) {
        array_push($array, $numero);
      }
    }
    $data = array('message' => $array);
    $this->renderHTML('../views/numeros_view.php', $data);
  }
}
