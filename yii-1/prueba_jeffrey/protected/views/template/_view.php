<?php
/* @var $this TemplateController */
/* @var $data Template */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tmpl_code')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tmpl_code), array('view', 'id'=>$data->tmpl_code)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tmpl_apellido')); ?>:</b>
	<?php echo CHtml::encode($data->tmpl_apellido); ?>
	<br />


</div>