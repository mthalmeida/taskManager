<?php
include("db/connect.php");
session_start();

if (isset($_SESSION["loginUser"]) and isset($_SESSION["passwordUser"])) {
  $loginUser = $_SESSION["loginUser"];
  $passwordUser = $_SESSION["passwordUser"];
  $nameUser = $_SESSION["nameUser"];

  $sql = "SELECT * FROM users WHERE loginUser = '{$loginUser}' and passwordUser = '{$passwordUser}'";
  $rs = mysqli_query($connect, $sql);
  $dados = mysqli_fetch_assoc($rs);
  $linha = mysqli_num_rows($rs);

  if ($linha == 0) {
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit();
  }
} else {
  header('Location: login.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="pt_br">

<head class="header">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Manager v1.0</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="css/tasks.css">
  <link rel="stylesheet" href="css/navbar.css">
</head>

<body class="custom-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <header class="header bg-body-tertiary">
          <div class="d-flex flex-column p-3 bg-body-tertiary">
            <img src="img/logoEraseBackground.png" alt="Logo" class="rounded img-fluid mx-auto d-block" width="120" height="55" style="margin-right: 60px">
            <hr>

            <ul class="nav nav-pills flex-column mb-auto">
              <li class="nav-item">
                <a href="index.php?menuop=home" class="nav-link active" aria-current="page">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                  </svg>
                  Início
                </a>
              </li>

              <li>
                <a href="index.php?menuop=tasks" class="nav-link link-body-emphasis">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-task" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z" />
                    <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z" />
                    <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z" />
                  </svg>
                  Tarefas
                </a>
              </li>

              <li>
                <a href="index.php?menuop=contacts" class="nav-link link-body-emphasis">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                  </svg>
                  Contatos
                </a>
              </li>
            </ul>

            <section class="section">
              <a href="#" class="d-flex-navbar align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <hr>
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong><?= $nameUser ?></strong>
              </a>
              <ul class="dropdown-menu text-small shadow">
                <li><a class="dropdown-item" href="index.php?menuop=cad-Task">Nova tarefa</a></li>
                <li><a class="dropdown-item" href="index.php?menuop=cad-contacts">Novo contato </a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="logout.php">Saír</a></li>
              </ul>
            </section>

          </div>
        </header>
      </div>
      <div class="col-md-9 rounded mx-auto d-block">
        <br>
        <main>
          <?php
          $menuop = (isset($_GET["menuop"])) ? $_GET["menuop"] : "home";

          switch ($menuop) {
            case 'login':
              include("pages/login/login.php");
              break;

            case 'home':
              include("pages/home/home.php");
              break;

            case 'contacts':
              include("pages/contacts/contacts.php");
              break;

            case 'cad-contacts':
              include("pages/contacts/cad-contacts.php");
              break;

            case 'insertContacts':
              include("pages/contacts/insertContacts.php");
              break;

            case 'edit-Contacts':
              include("pages/contacts/edit-Contacts.php");
              break;

            case 'updateContacts':
              include("pages/contacts/updateContacts.php");
              break;

            case 'delete-Contacts':
              include("pages/contacts/delete-Contacts.php");
              break;

            case 'deleteContacts':
              include("pages/contacts/deleteContacts.php");
              break;

            case 'tasks':
              include("pages/tasks/tasks.php");
              break;

            case 'cad-Task':
              include("pages/tasks/cad-Task.php");
              break;

            case 'insertTask':
              include("pages/tasks/insertTask.php");
              break;

            case 'edit-Task':
              include("pages/tasks/edit-Task.php");
              break;

            case 'updateTask':
              include("pages/tasks/updateTask.php");
              break;

            case 'delete-Task':
              include("pages/tasks/delete-Task.php");
              break;

            case 'deleteTask':
              include("pages/tasks/deleteTask.php");
              break;

            case 'insertUsers':
              include("pages/users/insertUsers.php");
              break;

            default:
              include("pages/home/home.php");
              break;
          }

          ?>
        </main>
      </div>
    </div>
  </div>

  <script src="./js/validate.js"></script>
</body>

</html>