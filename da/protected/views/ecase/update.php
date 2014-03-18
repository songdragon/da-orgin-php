<?php
/* @var $this EcaseController */
/* @var $model Ecase */

$this->breadcrumbs=array(
	'Ecases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ecase', 'url'=>array('index')),
	array('label'=>'Create Ecase', 'url'=>array('create')),
	array('label'=>'View Ecase', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ecase', 'url'=>array('admin')),
);
?>

<h1>Update Ecase <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>