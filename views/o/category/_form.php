<?php
/**
 * Support Contact Categories (support-contact-category)
 * @var $this CategoryController
 * @var $model SupportContactCategory
 * @var $form CActiveForm
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2012 Ommu Platform (www.ommu.co)
 * @modified date 21 September 2018, 06:36 WIB
 * @link https://github.com/ommu/mod-support
 *
 */
?>

<?php $form=$this->beginWidget('application.libraries.yii-traits.system.OActiveForm', array(
	'id'=>'support-contact-category-form',
	'enableAjaxValidation'=>true,
	/*
	'htmlOptions' => array(
		'enctype' => 'multipart/form-data',
		'on_post' => '',
	),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	*/
)); ?>

<div class="dialog-content">
	<fieldset>

		<?php //begin.Messages ?>
		<div id="ajax-message">
			<?php echo $form->errorSummary($model); ?>
		</div>
		<?php //begin.Messages ?>

		<div class="form-group row">
			<?php echo $form->labelEx($model, 'name_i', array('class'=>'col-form-label col-lg-4 col-md-4 col-sm-12')); ?>
			<div class="col-lg-8 col-md-8 col-sm-12">
				<?php echo $form->textField($model, 'name_i', array('maxlength'=>64, 'class'=>'form-control')); ?>
				<?php echo $form->error($model, 'name_i'); ?>
			</div>
		</div>

		<div class="form-group row">
			<?php echo $form->labelEx($model, 'cat_icon', array('class'=>'col-form-label col-lg-4 col-md-4 col-sm-12')); ?>
			<div class="col-lg-8 col-md-8 col-sm-12">
				<?php echo $form->textField($model, 'cat_icon', array('maxlength'=>32, 'class'=>'form-control')); ?>
				<?php echo $form->error($model, 'cat_icon'); ?>
			</div>
		</div>

		<?php if($model->publish != 2) {?>
		<div class="form-group row publish">
			<?php echo $form->labelEx($model, 'publish', array('class'=>'col-form-label col-lg-4 col-md-4 col-sm-12')); ?>
			<div class="col-lg-8 col-md-8 col-sm-12">
				<?php echo $form->checkBox($model, 'publish', array('class'=>'form-control')); ?>
				<?php echo $form->labelEx($model, 'publish'); ?>
				<?php echo $form->error($model, 'publish'); ?>
			</div>
		</div>
		<?php }?>
	</fieldset>
</div>
<div class="dialog-submit">
	<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('phrase', 'Create') : Yii::t('phrase', 'Save'), array('onclick' => 'setEnableSave()')); ?>
	<?php echo CHtml::button(Yii::t('phrase', 'Cancel'), array('id'=>'closed')); ?>
</div>
<?php $this->endWidget(); ?>