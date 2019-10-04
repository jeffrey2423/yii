<p><?php $this->pageTitle = yii::app()->name; 
$this->breadcrumbs=array(
	'Recuperacion de contraseña',
);
?>
</p>

<div class="main">
    <?php $form = $this->beginWidget('CActiveForm',array(
            'id'=>'recovery-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
    ))?>
     <div class="row">
        <?php echo $form->label($model,'correoUser'); ?>
        <?php echo $form->textField($model,'correoUser') ?>
    </div>
    <?php echo CHtml::submitButton('Recuperar',array('submit' => './recover'))?>
    <?php $this->endWidget(); ?>
</div>
