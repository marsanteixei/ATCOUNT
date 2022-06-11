<?php

  require_once("templates/header2.php");

  if($alunoDao) {
    $alunoDao->destroyToken();
  }