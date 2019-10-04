
<p><?php $this->pageTitle = yii::app()->name; 
$this->breadcrumbs=array(
	'Login',
);
?>
</p>

<h1>Log in</h1>
<div class="form">
	<?php $form = $this->beginWidget('CActiveForm',array(
		'id'=>'user-form',
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
	 <?php echo $form->label($model,'userPassword'); ?>
	 <?php echo $form->passwordField($model,'userPassword') ?>
 </div>
 <div class="row buttons">
 	<button type="submit" id="login" name="login">Log in</button>
 </div>
 <?php echo CHtml::link('¿Olvidaste tu contraseña?',array('recover'))?>
 <?php echo CHtml::link('¿Registrarse?',array('register'))?>
 <?php $this->endWidget(); ?>
</div>