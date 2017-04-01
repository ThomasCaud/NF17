<!DOCTYPE html>
<html>
  <head>
      <base href="<?= Config::get('baseUrl') ?: '/'; ?>" />
    <meta charset="utf-8">
    <title>NF17</title>
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.css" media="screen" title="no title">
  </head>
  <body>
      <div class="container">
          <header>
              <h1><a href="">Exploitation agricole</a></h1>
              <br/>
          </header>

          <?php require_once dirname(__FILE__)."/".$viewFile ?>
      </div>
  </body>
</html>
