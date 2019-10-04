<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<?php
	echo Yii::app()->bootstrap->registerAllCss();
	echo Yii::app()->bootstrap->registerCoreScripts();
	?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
	<div class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="navbar-inner">
			<div class="container">
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon bar"></span>
					<span class="icon bar"></span>
					<span class="icon bar"></span>
				</button>
				<a class="brand" href="<?php echo yii::app()->homeUrl; ?>">
					<?php echo yii::app()->name; ?>
				</a>
				<div class="nav-collapse collapse">
					<?php $this->widget('zii.widgets.CMenu', array(
						'items' => array(
							array('label' => 'Registro', 'url' => array('/votaciones/index'),'visible' => (Yii::app()->session['login'] !== null ? false : true)),
							array('label' => 'Login', 'url' => array('/votaciones/login'),'visible' => (Yii::app()->session['login'] !== null ? false : true)),
							/*array('label' => 'Gestion de empleados', 'url' => array('/usuario/manager'), 'visible' => (Yii::app()->session['login']['perfil'] === '1' ? true : false)),
							array('label' => 'Gestión de areas', 'url' => array('/area/index'), 'visible' => (Yii::app()->session['login']['perfil'] === '1' ? true : false)),
							array('label' => 'Gestión de empresas', 'url' => array('/empresa/index'), 'visible' => (Yii::app()->session['login']['perfil'] === '1' ? true : false)),
							array('label' => 'Gestión de actividades', 'url' => array('/actividad/create'), 'visible' => (Yii::app()->session['login']['perfil'] === '1' ? true : false)),*/
							array('label' => 'Logout ID:(' . Yii::app()->session['login']['usuario'] . ')', 'url' => array('/site/logout'), 'visible' => (Yii::app()->session['login'] !== null ? true : false))
						),
						'htmlOptions' => array('class' => 'nav navbar-nav')
					)); ?>
				</div>
			</div>
		</div>
	</div><!-- mainmenu -->
	<div class="container">
		<?php if (($msg = Yii::app()->user->getFlashes()) != null) : ?>
		<?php foreach($msg as $type => $message):?>
			<div class="alert alert-<?php echo $type ?>" role="alert">
			<?php echo ucfirst($message) ?>
			</div>
			<?php endforeach ?>
		<?php endif ?>
		<?php if (isset($this->breadcrumbs)) : ?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
					'links' => $this->breadcrumbs,
				)); ?>
			<!-- breadcrumbs -->
		<?php endif ?>
		<?php echo $content; ?>
	</div>
</body>

</html>