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
        <h5 class="modal-title">Cadastrar novo contato</h5>
        <button type="button" class="btn-close" onclick="history.back();" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div>
          <form action="index.php?menuop=insertContacts" method="post">

            <div class="form-group mb-4">
              <label for="nomeContato" class="form-label">Nome*</label>
              <input type="text" name="nomeContato" required class="form-control">
            </div>

            <div class="form-group mb-4">
              <label for="telefoneContato" class="form-label">Telefone*</label>
              <input type="tel" name="telefoneContato" required class="form-control">
            </div>

            <div class="form-group mb-4">
              <label for="emailContato" class="form-label">Email*</label>
              <input type="email" name="emailContato" required class="form-control">
            </div>

            <div class="form-group mb-4">
              <label for="senhaContato" class="form-label">senhaContato*</label>
              <input type="password" name="senhaContato" required class="form-control">
            </div>

            <div class="modal-footer">
              <button onclick="history.back();" type="button" class="btn btn-secondary" data-bs-dismiss="back">Cancelar</button>
              <button disabled type="submit" value="Adicionar" name="btnAdicionar" class="btn btn-primary">Salvar</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>