<?php
/**
 * Support Widgets (support-widget)
 * @var $this WidgetController
 * @var $model SupportWidget
 * @var $form CActiveForm
 * version: 0.2.0
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 3 February 2016, 12:26 WIB
 * @link https://github.com/ommu/Support
 * @contect (+62)856-299-4114
 *
 */

	$this->breadcrumbs=array(
		'Support Widgets'=>array('manage'),
		$model->widget_id=>array('view','id'=>$model->widget_id),
		'Update',
	);
?>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
)); ?>