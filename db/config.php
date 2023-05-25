<?php
$Ser_Alt1 = "4285509FD5C67AFED068D51BACD396FA44EB624EC9EE9F2A56";
$Ser_Alt2 = hash('sha256', $Ser_Alt1);
$Ser_Alt3 = hash('sha256', $Ser_Alt2);
$Ser_Alt4 = hash('sha256', $Ser_Alt3);
$Ser_Alt5 = hash('sha1', $Ser_Alt4);

define("SERVIDOR", "mysql670.umbler.com:41890");
define("USUARIO", "mthalmeida");
define("SENHA", $Ser_Alt5);
define("BANCO", "taskmananger");
