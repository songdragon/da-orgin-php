<?php
/* @var $this EcaseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ecases',
);

$this->menu=array(
	array('label'=>'Create Ecase', 'url'=>array('create')),
	array('label'=>'Manage Ecase', 'url'=>array('admin')),
);
?>

<h1>Ecases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
