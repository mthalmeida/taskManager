<!DOCTYPE html>
<html lang="pt_BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

</head>

<body>
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
          <h5 class="modal-title">Cadastro</h5>
          <button type="button" class="btn-close" onclick="history.back();" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div>
            <form action="index.php?menuop=insertUsers" method="post">

              <div class="form-group mb-4">
                <label for="loginUser" class="form-label">Nome de usuário*</label>
                <input type="text" name="loginUser" required class="form-control">
              </div>

              <div class="form-group mb-4">
                <label for="nomeUser" class="form-label">Nome e sobrenome*</label>
                <input type="text" name="nomeUser" required class="form-control">
              </div>

              <div class="form-group mb-4">
                <label for="emailUser" class="form-label">Email*</label>
                <input type="email" name="emailUser" required class="form-control">
              </div>

              <div class="form-group mb-4">
                <label for="senhaUser" class="form-label">Escolha uma senha*</label>
                <input type="password" name="senhaUser" required class="form-control">
              </div>

              <div class="modal-footer">
                <button onclick="history.back();" type="button" class="btn btn-secondary" data-bs-dismiss="back">Voltar</button>
                <button type="submit" value="Adicionar" name="btnAdicionar" class="btn btn-primary">Cadastrar</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
</body>

</html>