<?php
/**
 * Support Feedback View Histories (support-feedback-view-history)
 * @var $this ViewController
 * @var $model SupportFeedbackViewHistory
 * @var $form CActiveForm
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2017 Ommu Platform (opensource.ommu.co)
 * @created date 23 August 2017, 17:21 WIB
 * @modified date 21 March 2018, 12:35 WIB
 * @link https://github.com/ommu/mod-support
 *
 */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<ul>
		<li>
			<?php echo $model->getAttributeLabel('subject_search'); ?>
			<?php echo $form->textField($model, 'subject_search', array('class'=>'form-control')); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('user_search'); ?>
			<?php echo $form->textField($model, 'user_search', array('class'=>'form-control')); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('view_date'); ?>
			<?php /* $this->widget('application.libraries.core.components.system.CJuiDatePicker',array(
				'model'=>$model,
				'attribute'=>'view_date',
				//'mode'=>'datetime',
				'options'=>array(
					'dateFormat' => 'dd-mm-yy',
				),
				'htmlOptions'=>array(
					'class' => 'form-control',
				 ),
			)); */
			echo $form->dateField($model, 'view_date', array('class'=>'form-control')); ?>
		</li>

		<li>
			<?php echo $model->getAttributeLabel('view_ip'); ?>
			<?php echo $form->textField($model, 'view_ip', array('class'=>'form-control')); ?>
		</li>

		<li class="submit">
			<?php echo CHtml::submitButton(Yii::t('phrase', 'Search')); ?>
		</li>
	</ul>
<?php $this->endWidget(); ?>
