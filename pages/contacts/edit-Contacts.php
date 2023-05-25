<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#exemplomodal').modal('show');
  })
</script>

<?php
$idContato = $_GET["idContato"];
$sql = "SELECT * FROM Contatos WHERE idContato = {$idContato}";
$rs = mysqli_query($connect, $sql) or die("Erro ao realizar a consulta! ERROR: " . mysqli_error($connect));
$dados = mysqli_fetch_assoc($rs);
?>

<div class="modal" tabindex="-1" id="exemplomodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Alterar contato #<?= $idContato ?> </h5>
        <button type="button" class="btn-close" onclick="history.back();" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div>
          <form action="index.php?menuop=updateContacts" method="post">

            <div style="display: none">
              <label for="idContato" class="form-label">idContato*</label>
              <input value="<?= $dados["idContato"] ?>" type="text" name="idContato" required class="form-control">
            </div>

            <div class="form-group mb-4">
              <label for="nomeContato" class="form-label">Nome*</label>
              <input value="<?= $dados["nomeContato"] ?>" type="text" name="nomeContato" required class="form-control">
            </div>

            <div class="form-group mb-4">
              <label for="telefoneContato" class="form-label">Telefone*</label>
              <input value="<?= $dados["telefoneContato"] ?>" type="tel" name="telefoneContato" required class="form-control">
            </div>

            <div class="form-group mb-4">
              <label for="emailContato" class="form-label">Email*</label>
              <input value="<?= $dados["emailContato"] ?>" type="email" name="emailContato" required class="form-control">
            </div>

            <div style="display: none">
              <label for="senhaContato" class="form-label">senhaContato*</label>
              <input value="<?= $dados["senhaContato"] ?>" type="password" name="senhaContato" required class="form-control">
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