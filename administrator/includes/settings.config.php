<?php


try {
      $db = new PDO("mysql:host=localhost;dbname=db", "root", "");
} catch ( PDOException $e ){
     print $e->getMessage();
}


?>
