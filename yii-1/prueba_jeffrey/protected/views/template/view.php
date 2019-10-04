<?php
/* @var $this TemplateController */
/* @var $model Template */

$this->breadcrumbs=array(
	'Templates'=>array('index'),
	$model->tmpl_code,
);

$this->menu=array(
	array('label'=>'List Template', 'url'=>array('index')),
	array('label'=>'Create Template', 'url'=>array('create')),
	array('label'=>'Update Template', 'url'=>array('update', 'id'=>$model->tmpl_code)),
	array('label'=>'Delete Template', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tmpl_code),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Template', 'url'=>array('admin')),
);
?>

<h1>View Template #<?php echo $model->tmpl_code; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tmpl_code',
		'tmpl_apellido',
	),
)); ?>
