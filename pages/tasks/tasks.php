<div>
    <p class="text-center fs-2">Tarefas</p>
    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
        <a href="index.php?menuop=cad-Task">
            <button class="btn btn-light" type="button">Nova tarefa</button>
        </a>
    </div>
</div>

<hr>

<div class="tableResult">
    <table class="table table-striped-columns text-center">
        <tr>
            <th>#</th>
            <th>Título</th>
            <th>Descrição</th>
            <th>Responsável</th>
            <th>Criação</th>
            <th>Conclusão</th>
            <th>Status</th>
            <th> </th>
            <th> </th>
            <th> </th>
        </tr>

        <?php
        $sql = "SELECT * FROM `Tarefas`";
        $rs = mysqli_query($connect, $sql) or die("Erro ao realizar a consulta! ERROR: " . mysqli_error($connect));

        while ($dados = mysqli_fetch_assoc($rs)) { ?>


            <tr>
                <td class="table-Light"><?= $dados["idTarefa"] ?></td>
                <td class="table-Light"><?= $dados["nomeTarefa"] ?></td>
                <td class="table-Light"><?= $dados["descTarefa"] ?></td>
                <td class="table-Light"><?= $dados["responsavelTarefa"] ?></td>
                <td class="table-Light"><?= $dados["dataCriacao"] ?></td>
                <td class="table-Light"><?= $dados["dataConclusao"] ?></td>
                <td class=<?= $dados["statusTarefa"] === "Pendente" ? "table-danger" : "table-success" ?>>
                    <?= $dados["statusTarefa"] ?></td>


                <td>
                    <a href="index.php?menuop=edit-Task&idTarefa=<?= $dados["idTarefa"] ?>">✏️</a>
                </td>
                <td>
                    <a href="index.php?menuop=delete-Task&idTarefa=<?= $dados["idTarefa"] ?>">❌</a>
                </td>
                <td>
                    <a href="#">🖨️</a>
                </td>
            </tr>

        <?php
        }
        ?>

    </table>

</div>