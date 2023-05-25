<?php
include "./db/connect.php";

$msg_error = "";
if (isset($_POST["loginUser"]) && isset($_POST["passwordUser"])) {
  $loginUser = mysqli_escape_string($connect, $_POST["loginUser"]);
  $passwordUser = hash('sha256', $_POST["passwordUser"]);

  $sql = "SELECT * FROM users WHERE loginUser = '{$loginUser}' and passwordUser = '{$passwordUser}'";
  $rs = mysqli_query($connect, $sql);
  $dados = mysqli_fetch_assoc($rs);
  $linha = mysqli_num_rows($rs);

  if ($linha != 0) {
    session_start();
    $_SESSION["loginUser"] = $loginUser;
    $_SESSION["passwordUser"] = $passwordUser;
    $_SESSION["nameUser"] = $dados["nameUser"];
    header('Location: index.php');
  } else {
    $msg_error =
      "<div class='alert alert-danger mt-3'>
            <p> Usuário ou senha incorreta!</p>
          </div>";
  }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Task Manager</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/backgroundLogin.css">

</head>

<body class="bg-background">
  <div class="container">
    <div class="row vh-100 align-items-center justify-content-center">
      <div class="col-10 col-sm-8 col-md-6 col-lg-4 p-4 bg-white shadow rounded">
        <div class="row justify-content-center">
          <img src="./img/logoEraseBackground.png" alt="logo">
          <hr>

          <form class="needs-validation" action="login.php" method="post" novalidate>

            <div class="form-group mb-4">
              <label class="form-label" for="loginUser">Login</label>
              <div class="input-group">
                <span class="input-group-text">
                  <i class="bi bi-person-fill"></i>
                </span>
                <input class="form-control" type="text" name="loginUser" id="loginUser" required>
                <div class="invalid-feedback">
                  Digite um e-mail válido.
                </div>
              </div>
            </div>

            <div class="form-group mb-4">
              <label class="form-label" for="passwordUser">Senha</label>
              <div class="input-group">
                <span class="input-group-text">
                  <i class="bi bi-key-fill"></i>
                </span>
                <input class="form-control" type="password" name="passwordUser" id="passwordUser" required>
                <div class="invalid-feedback">
                  Digite uma senha válida.
                </div>
              </div>
            </div>

            <?php
            echo $msg_error;
            ?>

            <button class="btn btn-success w-100">
              <i class="bi bi-box-arrow-in-right"> </i>
              Entrar
            </button>

            <p class="text-center" style="font-size: 12px; color: #b3b3b3; margin-top: 10px;">
              Não está registrado? <a style="color: #4CAF50;" href="pages/users/cad-users.php">Crie uma conta.</a>
            </p>
          </form>

        </div>
      </div>
    </div>
  </div>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="./js/validate.js"></script>
</body>

</html>