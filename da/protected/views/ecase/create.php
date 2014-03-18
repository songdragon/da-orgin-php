<?php
/* @var $this EcaseController */
/* @var $model Ecase */

$this->breadcrumbs=array(
	'Ecases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ecase', 'url'=>array('index')),
	array('label'=>'Manage Ecase', 'url'=>array('admin')),
);
?>

<h1>Create Ecase</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>