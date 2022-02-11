<?php
  require('../model/superhero.php');

  $e = superhero::load($_GET['id']);

  echo json_encode($e);
?>