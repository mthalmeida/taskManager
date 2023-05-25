<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#exemplomodal').modal('show');
  })
</script>

<?php
$idTarefa = $_GET["idTarefa"];
$sql = "SELECT * FROM Tarefas WHERE idTarefa = {$idTarefa}";
$rs = mysqli_query($connect, $sql) or die("Erro ao realizar a consulta! ERROR: " . mysqli_error($connect));
$dadosTask = mysqli_fetch_assoc($rs);
?>


<div class="modal" tabindex="-1" id="exemplomodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Atualizar tarefa #<?= $idTarefa ?> </h5>
        <button type="button" class="btn-close" onclick="history.back();" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div>
          <form action="index.php?menuop=updateTask" method="post">

            <div style="display: none">
              <label for="idTarefa" class="form-label">idTarefa*</label>
              <input value="<?= $dadosTask["idTarefa"] ?>" type="text" name="idTarefa" required class="form-control">
            </div>

            <div class="form-group mb-4">
              <label for="nomeTarefa" class="form-label">Título*</label>
              <input value="<?= $dadosTask["nomeTarefa"] ?>" type="text" name="nomeTarefa" required class="form-control">
            </div>

            <div class="form-group mb-4">
              <label for="descTarefa" class="form-label">Descrição*</label>
              <input value="<?= $dadosTask["descTarefa"] ?>" type="text" name="descTarefa" required class="form-control">
            </div>

            <label for="responsavelTarefa" class="form-label">Responsável*</label>
            <select name="responsavelTarefa" required class="form-control mb-4">
              <?php
              $sql = "SELECT * FROM `Contatos`";
              $rs = mysqli_query($connect, $sql) or die("Erro ao realizar a consulta! ERROR: " . mysqli_error($connect));
              while ($dadosContacts = mysqli_fetch_assoc($rs)) {

                $nomeContato = $dadosContacts["nomeContato"];
                $nomeResponsavel = $dadosTask["responsavelTarefa"];

                $selected = ($nomeContato === $nomeResponsavel) ? "selected" : "";

                echo "<option class=\"table-Light\" $selected>$nomeContato</option>";
              }
              ?>
            </select>

            <div class="form-group mb-4">
              <label for="dataCriacao" class="form-label">Data de criação*</label>
              <input value="<?= $dadosTask["dataCriacao"] ?>" type="date" name="dataCriacao" required class="form-control">
            </div>

            <div class="form-group mb-4">
              <label for="dataConclusao" class="form-label">Data de conclusão</label>
              <input type="date" name="dataConclusao" id="dataConclusao" class="form-control">
            </div>

            <div class="form-group mb-4">
              <label for="statusTarefa" class="form-label">Status*</label>
              <select name="statusTarefa" required class="form-control" onchange="validarDataConclusao()">
                <option value="Pendente">Pendente</option>
                <option value="Concluido">Concluído</option>
              </select>
            </div>

            <script>
              function validarDataConclusao() {
                var statusTarefa = document.getElementsByName("statusTarefa")[0];
                var dataConclusao = document.getElementById("dataConclusao");

                if (statusTarefa.value === "Concluido") {
                  dataConclusao.required = true;
                } else {
                  dataConclusao.required = false;
                }
              }
            </script>

            <div class="modal-footer">
              <button onclick="history.back();" type="button" class="btn btn-secondary" data-bs-dismiss="back">Cancelar</button>
              <button type="submit" value="Adicionar" name="btnAdicionar" class="btn btn-primary">Salvar</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>