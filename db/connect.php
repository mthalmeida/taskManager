<?php
  include("config.php");
  $connect = mysqli_connect(SERVIDOR, USUARIO, SENHA, BANCO) or die("Falha ao conectar ao Banco MYSQL! ERROR: " . mysqli_connect_error());
