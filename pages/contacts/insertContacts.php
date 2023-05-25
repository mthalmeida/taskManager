<?php

$idContato = mysqli_real_escape_string($connect, $_POST["idContato"]);
$nomeContato = mysqli_real_escape_string($connect, $_POST["nomeContato"]);
$emailContato = mysqli_real_escape_string($connect, $_POST["emailContato"]);
$telefoneContato = mysqli_real_escape_string($connect, $_POST["telefoneContato"]);
$senhaContato = mysqli_real_escape_string($connect, $_POST["senhaContato"]);

$sql = "INSERT INTO Contatos ( idContato, nomeContato, emailContato, telefoneContato, senhaContato) 

VALUES (
    '{$idContato}',
    '{$nomeContato}',
    '{$emailContato}',
    '{$telefoneContato}',
    '{$senhaContato}'
    )
    ";

$rs = mysqli_query($connect, $sql)
  or die("Erro ao realizar a consulta! ERROR: "
    . mysqli_error($connect));

?>

<p class="text-center">Contato cadastrado com sucesso!</p>


<p class="text-center">
  <span style="display: inline;">Redirecionando em </span>
  <span id="cronometro" style="display: inline;">3</span>
</p>

<script>
  setTimeout(function() {
    window.location.href = "index.php?menuop=contacts";
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