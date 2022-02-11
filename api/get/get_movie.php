<?php
  require('../model/movie.php');

  $e = movie::load($_GET['id']);

  echo json_encode($e);
?>