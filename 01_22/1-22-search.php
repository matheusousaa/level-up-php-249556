<?php
  function search_page( $term ) {
    $term = strtolower($term);
    $page = 'content.html';
    $content = file_get_contents($page);
    $content_normalized = strtolower(strip_tags($content));
    $offset = strpos($content_normalized, $term);

    if (!$offset) {
        return "No results found";
    }

    return substr($content_normalized, $offset-50, strlen($term)+100);

  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Page Search</title>
        <meta name="author" value="Joe Casabona" />
    </head>
    <body>
        <?php
          if( isset( $_GET['search'] ) ) {
            echo search_page( $_GET['search'] );
          }
        ?>
        <form name="page-search" method="GET">
          <div>
            <input type="text" name="search" />
            <input type="submit" name="submit" value="Search" />
          </div>
        </form>
    </body>
</html>