<?php
/* @var $this TemplateController */
/* @var $model Template */

$this->breadcrumbs=array(
	'Templates'=>array('index'),
	$model->tmpl_code=>array('view','id'=>$model->tmpl_code),
	'Update',
);

$this->menu=array(
	array('label'=>'List Template', 'url'=>array('index')),
	array('label'=>'Create Template', 'url'=>array('create')),
	array('label'=>'View Template', 'url'=>array('view', 'id'=>$model->tmpl_code)),
	array('label'=>'Manage Template', 'url'=>array('admin')),
);
?>

<h1>Update Template <?php echo $model->tmpl_code; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>