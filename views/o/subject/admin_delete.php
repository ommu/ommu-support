<?php
/**
 * Support Feedback Subjects (support-feedback-subject)
 * @var $this SubjectController
 * @var $model SupportFeedbackSubject
 * @var $form CActiveForm
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2018 Ommu Platform (opensource.ommu.co)
 * @created date 15 March 2018, 14:05 WIB
 * @link https://github.com/ommu/mod-support
 *
 */

	$this->breadcrumbs=array(
		'Feedback Subjects'=>array('manage'),
		'Delete',
	);
?>

<?php $form=$this->beginWidget('application.libraries.core.components.system.OActiveForm', array(
	'id'=>'support-feedback-subject-form',
	'enableAjaxValidation'=>true,
	//'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

	<div class="dialog-content">
		<?php echo Yii::t('phrase', 'Are you sure you want to delete this item?');?>
	</div>
	<div class="dialog-submit">
		<?php echo CHtml::submitButton(Yii::t('phrase', 'Delete'), array('onclick' => 'setEnableSave()')); ?>
		<?php echo CHtml::button(Yii::t('phrase', 'Cancel'), array('id'=>'closed')); ?>
	</div>
	
<?php $this->endWidget(); ?>
