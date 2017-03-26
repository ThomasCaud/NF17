<?php

class View
{
      public function render($path, $vars) {
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
}

?>
