<?php
  function search_page( $term ) {
    //write this function
    $page = 'content.html'; 
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
            search_page( $_GET['search'] );
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