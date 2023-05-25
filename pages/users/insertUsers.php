<?php

$loginUser = mysqli_real_escape_string($connect, $_POST["loginUser"]);
$nomeUser = mysqli_real_escape_string($connect, $_POST["nomeUser"]);
$emailUsers = mysqli_real_escape_string($connect, $_POST["emailUsers"]);
$senhalUsers = mysqli_real_escape_string($connect, $_POST["senhalUsers"]);

$sql = "INSERT INTO users ( loginUser, nomeUser, emailUsers, senhalUsers) 

VALUES (
    '{$loginUser}',
    '{$nomeUser}',
    '{$emailUsers}',
    '{$telefoneContato}',
    '{$senhalUsers}'
    )
    ";

$rs = mysqli_query($connect, $sql)
  or die("Erro ao realizar a consulta! ERROR: "
    . mysqli_error($connect));

?>

<p class="text-center">Novo cadastro realizado com sucesso!</p>


<p class="text-center">
  <span style="display: inline;">Redirecionando em </span>
  <span id="cronometro" style="display: inline;">3</span>
</p>

<script>
  setTimeout(function() {
    window.location.href = "logout.php";
  }, 3000);

  function exibirCronometro(segundos) {
    var cronometroElement = document.getElementById("cronometro");
    cronometroElement.innerHTML = segundos;

    if (segundos > 0) {
      setTimeout(function() {
        exibirCronometro(segundos - 1);
      }, 1000);
    }
  }

  exibirCronometro(3);
</script>