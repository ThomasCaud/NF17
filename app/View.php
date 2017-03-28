<?php

class View
{
      public function render($path, $vars = []) {
          global $viewFile;
          $viewFile = $path;
          if(!file_exists("../views/".$viewFile)) {
              header("HTTP/1.0 404 Not Found");
              echo "Erreur interne : le fichier vue 'views/$viewFile' doit être créer";
              die();
          }

          if(is_array($vars)) {
              extract($vars);
              unset($vars);
          }

          require_once '../views/layout.php';
      }

      public function render404($subtitle = false) {
          header("HTTP/1.0 404 Not Found");
          $action = "404.php";
          $vars = false;
          if ($subtitle) {
              $vars = ['subtitle' => $subtitle];
          }

          Self::render('404.php', $vars ?: null);
      }
}

?>
