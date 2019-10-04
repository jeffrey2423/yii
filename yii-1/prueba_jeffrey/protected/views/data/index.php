<table class="table table-hover my-5">
    <thead class="thead-dark">
        <tr>
            <th>id</th>
            <th>nombre</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

        <?php
        foreach ($usuarios as $data) { ?>
            <tr>
                <td><?= $data["id"] ?></td>
                <td><?= $data["username"] ?></td>
                <td><?= $data["email"] ?></td>
                <td>
                    <a class="btn btn-primary" href="<?= Yii::app()->request->baseUrl ?>/crud/modificar/<?= $data["id"] ?>">
                        Editar
                    </a>
                    <a class="btn btn-danger" href="<?= Yii::app()->request->baseUrl?>/crud/eliminar/<?= $data["id"] ?>">
                        Eliminar
                    </a>
                </td>

            </tr>

        <?php } ?>

    </tbody>
</table>