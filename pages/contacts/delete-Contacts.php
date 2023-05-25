<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<?php
$idContato = $_GET["idContato"];
$sql = "SELECT * FROM Contatos WHERE idContato = {$idContato}";
$rs = mysqli_query($connect, $sql) or die("Erro ao realizar a consulta! ERROR: " . mysqli_error($connect));
$dados = mysqli_fetch_assoc($rs);
?>

<script type="text/javascript">
  $(document).ready(function() {
    $('#exemplomodal').modal('show');
  })

  function validarNomeContato() {
    var nomeDigitado = $('[name="nomeContato"]').val();
    var nomeBancoDados = '<?= $dados["nomeContato"] ?>';

    var btnApagar = $('[name="btnAdicionar"]');
    if (nomeDigitado === nomeBancoDados) {
      btnApagar.prop('disabled', false);
    } else {
      btnApagar.prop('disabled', true);
    }
  }
</script>

<div class="modal" tabindex="-1" id="exemplomodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Excluir usuário</h5>
        <button type="button" class="btn-close" onclick="history.back();" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
          <form action="index.php?menuop=deleteContacts" method="post">

            <div style="display: none">
              <label for="idContato" class="form-label">idContato*</label>
              <input value="<?= $dados["idContato"] ?>" type="text" name="idContato" required class="form-control">
            </div>

            <div class="modal-body mb-4">
              <p>Você tem certeza de que deseja excluir este usuário?</p>
              <p>Digite novamente o nome <?= $dados["nomeContato"] ?> abaixo para confirmar a exclusão:</p>
              <div class="form-group mb-4">
                <label for="nomeContato" class="form-label"></label>
                <input type="text" name="nomeContato" required class="form-control" onkeyup="validarNomeContato()">
              </div>
              <div class="form-group mb-4">
                <p>Certifique-se de digitar o nome do usuário corretamente para confirmar a exclusão. Esta ação é irreversível e todos os dados relacionados ao usuário serão excluídos permanentemente.</p>
              </div>
            </div>

            <div class="modal-footer">
              <button onclick="history.back();" type="button" class="btn btn-secondary" data-bs-dismiss="back">Cancelar</button>
              <button type="submit" value="Adicionar" name="btnAdicionar" class="btn btn-primary" disabled>Apagar</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>