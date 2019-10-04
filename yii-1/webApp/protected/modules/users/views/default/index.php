
<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'user-users_form-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // See class documentation of CActiveForm for details on this,
    // you need to use the performAjaxValidation()-method described there.
    'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'idUser'); ?>
        <?php echo $form->textField($model,'idUser'); ?>
        <?php echo $form->error($model,'idUser'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'nombreUser'); ?>
        <?php echo $form->textField($model,'nombreUser'); ?>
        <?php echo $form->error($model,'nombreUser'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'apellidoUser'); ?>
        <?php echo $form->textField($model,'apellidoUser'); ?>
        <?php echo $form->error($model,'apellidoUser'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'cedulaUser'); ?>
        <?php echo $form->textField($model,'cedulaUser'); ?>
        <?php echo $form->error($model,'cedulaUser'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'fechaCreacion'); ?>
        <?php echo $form->textField($model,'fechaCreacion'); ?>
        <?php echo $form->error($model,'fechaCreacion'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->