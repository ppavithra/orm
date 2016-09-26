<?php
    defined('__GEST3IL__') or die('Acces interdit');

?>
<!doctype html>
  <html>
      <head>
          <title>Coup de pouce</title>
          <script type="text/javascript" src="javascript/jquery-2.1.1.js"></script>
          <meta charset='utf-8'>
      </head>
      <hr>
      <h3>Page</h3>
      <pre><?php print_r(Application::getPage());?></pre>
      <h3>POST</h3>
      <pre><?php print_r($_POST);?></pre>
      <body>
          <h1>Template: <?php echo basename(__FILE__);?></h1>
          <?php Page::afficherVue();?>
      </body>
  </html>

