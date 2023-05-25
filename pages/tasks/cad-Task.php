<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#exemplomodal').modal('show');
  })
</script>




<div class="modal" tabindex="-1" id="exemplomodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastrar nova tarefa</h5>
        <button type="button" class="btn-close" onclick="history.back();" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div>
          <form action="index.php?menuop=insertTask" method="post">

            <div class="form-group mb-4">
              <label for="nomeTarefa" class="form-label">Título*</label>
              <input type="text" name="nomeTarefa" required class="form-control">
            </div>

            <div class="form-group mb-4">
              <label for="descTarefa" class="form-label">Descrição*</label>
              <input type="text" name="descTarefa" required class="form-control">
            </div>


            <div class="form-group mb-4">
              <label for="responsavelTarefa" class="form-label">Responsável*</label>
              <select name="responsavelTarefa" required class="form-control">


                <?php
                $sql = "SELECT * FROM `Contatos`";
                $rs = mysqli_query($connect, $sql) or die("Erro ao realizar a consulta! ERROR: " . mysqli_error($connect));
                while ($dados = mysqli_fetch_assoc($rs)) { ?>
                  <option class="table-Light" value=<?= $dados["nomeContato"] ?>><?= $dados["nomeContato"] ?></option>
                <?php
                }
                ?>
              </select>
            </div>

            <div class="form-group mb-4">
              <label for="dataCriacao" class="form-label">Data de criação*</label>
              <input type="date" name="dataCriacao" required class="form-control" value="<?= date('Y-m-d') ?>">
            </div>


            <div class="form-group mb-4">
              <label for="dataConclusao" class="form-label">Data de conclusão</label>
              <input type="date" name="dataConclusao" class="form-control">
            </div>

            <div class="form-group mb-4">
              <label for="statusTarefa" class="form-label">Status*</label>
              <select name="statusTarefa" required class="form-control">
                <option value="Pendente" selected>Pendente</option>
                <option value="Concluído" disabled>Concluído</option>
              </select>
            </div>

            <div class="modal-footer">
              <button onclick="history.back();" type="button" class="btn btn-secondary" data-bs-dismiss="back">Cancelar</button>
              <button type="submit" value="Adicionar" name="btnAdicionar" class="btn btn-primary">Salvar</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>