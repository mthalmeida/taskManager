    <div>
        <p class="text-center fs-2">Contatos</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
            <a href="index.php?menuop=cad-contacts">
                <button class="btn btn-light" type="button">Novo contato</button>
            </a>
        </div>
    </div>

    <hr>

    <div class="tableResult">
        <table class="table table-striped-columns text-center">
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th> </th>
                <th> </th>
            </tr>

            <?php
            $sql = "SELECT * FROM `Contatos`";
            $rs = mysqli_query($connect, $sql) or die("Erro ao realizar a consulta! ERROR: " . mysqli_error($connect));

            while ($dados = mysqli_fetch_assoc($rs)) { ?>


                <tr>
                    <td class="table-Light"><?= $dados["idContato"] ?></td>
                    <td class="table-Light"><?= $dados["nomeContato"] ?></td>
                    <td class="table-Light"><?= $dados["emailContato"] ?></td>
                    <td class="table-Light"><?= $dados["telefoneContato"] ?></td>


                    <td>
                        <a href="index.php?menuop=edit-Contacts&idContato=<?= $dados["idContato"] ?>">✏️</a>
                    </td>
                    <td>
                        <a href="index.php?menuop=delete-Contacts&idContato=<?= $dados["idContato"] ?>">❌</a>
                    </td>
                </tr>

            <?php
            }
            ?>

        </table>

    </div>