<h1>prueba funcionando <?php echo $prueba ?></h1>

<table class="table table-hover my-5">
    <thead class="thead-dark">
        <tr>
            <th>id</th>
            <th>nombre</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>

        <?php
        foreach ($model as $data) { ?>
            <tr>
                <td><?php echo $data->username ?></td>
                <td><?php echo $data->username ?></td>
                <td><?php echo $data->email ?></td>
                <td>
                    <a class="btn btn-primary" href="<?= Yii::app()->request->baseUrl ?>/crud/modificar/<?= $usuario["id"] ?>">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                </td>
                <td>
                    <a class="btn btn-danger" href="<?= Yii::app()->request->baseUrl
                                                        ?>/crud/eliminar/<?= $usuario["id"] ?>">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>

            </tr>

        <?php } ?>

    </tbody>
</table>