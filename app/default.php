<?php
  $app = new Atom();
  $page = $GLOBALS['page'];
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?=$page['title']; ?></title>
    <!-- loader css -->
    <?php if( $page["css"] ): foreach( $page["css"] as $css ): ?>
    <link rel="stylesheet" type="text/css" href="<?=$css; ?>">
    <?php endforeach; endif; ?>
    <!-- ./ -->
  </head>
  <body>
    <?php
      # view of validate
      $app->page($page["view"]);
      # all js
      if( $page["js"] ): 
        foreach( $page["js"] as $js ):
    ?>
    <script src="<?=$js; ?>" type="text/javascript"></script>
    <?php 
        endforeach; 
      endif; 
    ?>
  </body>
</html>