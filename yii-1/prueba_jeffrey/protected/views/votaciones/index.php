<?php
/* @var $this VotacionesUsuarioController */
/* @var $model VotacionesUsuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'votaciones-usuario-index-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre'); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellido'); ?>
		<?php echo $form->textField($model,'apellido'); ?>
		<?php echo $form->error($model,'apellido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario'); ?>
		<?php echo $form->error($model,'usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clave'); ?>
		<?php echo $form->passwordField($model,'clave'); ?>
		<?php echo $form->error($model,'clave'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Registrarse', array("class" => "btn btn-success")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->