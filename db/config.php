 <?php
$Ser_Alt1 = "SUA_SENHA_INICIAL";
$Ser_Alt2 = hash('sha256', $Ser_Alt1);
$Ser_Alt3 = hash('sha256', $Ser_Alt2);
$Ser_Alt4 = hash('sha256', $Ser_Alt3);
$Ser_Alt5 = hash('sha1', $Ser_Alt4);

define("SERVIDOR", "SEU_SERVIDOR_COM_PORTA");
define("USUARIO", "USUARIO");
define("SENHA", $Ser_Alt5);
define("BANCO", "NOME_DO_BANCO");
