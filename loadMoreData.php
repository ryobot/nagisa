<?php

   require('db_config.php');

   $sql = "SELECT * FROM posts WHERE id < '".$_GET['last_id']."' ORDER BY id DESC LIMIT 8"; 

   $result = $mysqli->query($sql);

   $json = include('data.php');

   echo json_encode($json);
?>