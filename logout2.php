<?php

  require_once("templates/header3.php");

  if($coordenadorDao) {
    $coordenadorDao->destroyToken();
  }