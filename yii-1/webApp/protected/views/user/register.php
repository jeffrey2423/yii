<h1>Formulario de registro</h1>

<div class="form">
    <?php $form = $this->beginWidget('CActiveForm',array(
		'id'=>'register-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)) ?>
     <div class="row">
        <?php echo $form->label($model,'nombreUser'); ?>
        <?php echo $form->textField($model,'nombreUser') ?>
    </div>
    <div class="row">
        <?php echo $form->label($model,'apellidoUser'); ?>
        <?php echo $form->textField($model,'apellidoUser') ?>
    </div>
    <div class="row">
        <?php echo $form->label($model,'correoUser'); ?>
        <?php echo $form->textField($model,'correoUser') ?>
    </div>
    <div class="row">
        <?php echo $form->label($model,'userPassword'); ?>
        <?php echo $form->passwordField($model,'userPassword') ?>
    </div>
    <?php echo CHtml::submitButton('Registrar',array('submit' => './register'))?>
    <?php $this->endWidget(); ?>
</div>