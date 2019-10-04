<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>
<div class="container"> 
<table class="table table-hover my-5">
<?php echo CHtml::link('Crear', array('add'),array( 'class'=> 'btn btn-secondary'));?>
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
                    <?php echo CHtml::link('Actualizar', array('edit', 'id'=>$data['id'], 'view'=>false), array( 'class'=> 'btn btn-secondary'));?>
                    <?php echo CHtml::link('Eliminar', array('delete', 'id'=>$data['id']),array("confirm"=>"¿Desea borrar este dato?",'class'=> 'btn btn-danger'));?>
                    <?php echo CHtml::link('Ver', array('edit', 'id'=>$data['id'], 'view'=>true), array( 'class'=> 'btn btn-secondary'));?>
                </td>

            </tr>

        <?php } ?>

    </tbody>
</table>
</div>
<?php endif; ?>