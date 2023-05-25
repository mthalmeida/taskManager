<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<?php
$idTarefa = $_GET["idTarefa"];
$sql = "SELECT * FROM Tarefas WHERE idTarefa = {$idTarefa}";
$rs = mysqli_query($connect, $sql) or die("Erro ao realizar a consulta! ERROR: " . mysqli_error($connect));
$dados = mysqli_fetch_assoc($rs);
?>

<script type="text/javascript">
  $(document).ready(function() {
    $('#exemplomodal').modal('show');
  })
</script>

<div class="modal" tabindex="-1" id="exemplomodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Excluir tarefa #<?= $idTarefa ?> </h5>
        <button type="button" class="btn-close" onclick="history.back();" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
          <form action="index.php?menuop=deleteTask" method="post">

            <div style="display: none">
              <label for="idTarefa" class="form-label">ID da Tarefa*</label>
              <input value="<?= $dados["idTarefa"] ?>" type="text" name="idTarefa" required class="form-control">
            </div>

            <div class="modal-body">
              <p>Você tem certeza de que deseja excluir essa tarefa?</p>
            </div>

            <div class="modal-footer">
              <button onclick="history.back();" type="button" class="btn btn-secondary" data-bs-dismiss="back">Cancelar</button>
              <button type="submit" value="Adicionar" name="btnAdicionar" class="btn btn-primary">Apagar</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>