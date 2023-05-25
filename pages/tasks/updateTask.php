<?php

$idTarefa = mysqli_real_escape_string($connect, $_POST["idTarefa"]);
$nomeTarefa = mysqli_real_escape_string($connect, $_POST["nomeTarefa"]);
$descTarefa = mysqli_real_escape_string($connect, $_POST["descTarefa"]);
$responsavelTarefa = mysqli_real_escape_string($connect, $_POST["responsavelTarefa"]);
$dataCriacao = mysqli_real_escape_string($connect, $_POST["dataCriacao"]);
$dataConclusao = mysqli_real_escape_string($connect, $_POST["dataConclusao"]);
$statusTarefa = mysqli_real_escape_string($connect, $_POST["statusTarefa"]);

$sql = "UPDATE `Tarefas` SET
nomeTarefa = '{$nomeTarefa}',
descTarefa = '{$descTarefa}',
responsavelTarefa = '{$responsavelTarefa}',
dataCriacao = '{$dataCriacao}',
dataConclusao = '{$dataConclusao}',
statusTarefa = '{$statusTarefa}'
WHERE idTarefa = '{$idTarefa}'
";

$rs = mysqli_query($connect, $sql) or die("Erro ao realizar a consulta! ERROR: " . mysqli_error($connect));

?>

<p class="text-center">Tarefa alterada com sucesso!</p>


<p class="text-center">
  <span style="display: inline;">Redirecionando em </span>
  <span id="cronometro" style="display: inline;">3</span>
</p>

<script>
  setTimeout(function() {
    window.location.href = "index.php?menuop=tasks";
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