<?php
/**
 * Support Contacts (support-contacts)
 * @var $this ContactsController
 * @var $model SupportContacts
 * @var $form CActiveForm
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2012 Ommu Platform (opensource.ommu.co)
 * @link https://github.com/ommu/ommu-support
 *
 */
?>

<?php $form=$this->beginWidget('application.libraries.core.components.system.OActiveForm', array(
	'id'=>'support-contacts-form',
	'enableAjaxValidation'=>true,
	//'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>
<div class="dialog-content">

	<fieldset>

		<?php 
		if($model->category->publish != 2) {?>
			<div class="form-group row">
				<label class="col-form-label col-lg-4 col-md-3 col-sm-12"><?php echo $model->getAttributeLabel('cat_id');?> <span class="required">*</span></label>
				<div class="col-lg-8 col-md-9 col-sm-12">
					<?php
					if($model->isNewRecord) {
						$category = SupportContactCategory::getCategory(1, 'contact');
						if($category != null)
							echo $form->dropDownList($model,'cat_id', $category, array('prompt'=>'', 'class'=>'form-control'));
						else
							echo $form->dropDownList($model,'cat_id', array('prompt'=>Yii::t('phrase', 'No Parent')), array('class'=>'form-control'));
					} else {?>
						<strong><?php echo $model->category->title->message; ?></strong>
					<?php }?>
					<?php echo $form->error($model,'cat_id'); ?>
				</div>
			</div>
		<?php }?>

		<div class="form-group row">
			<?php if($model->category->publish != '2') {?>
				<label class="col-form-label col-lg-4 col-md-3 col-sm-12"><?php echo $model->getAttributeLabel('contact_name');?> <span class="required">*</span></label>
			<?php } else {?>
				<label class="col-form-label col-lg-4 col-md-3 col-sm-12"><?php echo $model->category->title->message;?> <span class="required">*</span></label>
			<?php }?>
			<div class="col-lg-8 col-md-9 col-sm-12">
				<?php echo $form->textArea($model,'contact_name',array('rows'=>6, 'cols'=>50, 'class'=>'form-control smaller')); ?>
				<?php echo $form->error($model,'contact_name'); ?>
			</div>
		</div>

		<?php if($model->category->publish != 2) {?>
		<div class="form-group row publish">
			<?php echo $form->labelEx($model,'publish', array('class'=>'col-form-label col-lg-4 col-md-3 col-sm-12')); ?>
			<div class="col-lg-8 col-md-9 col-sm-12">
				<?php echo $form->checkBox($model,'publish', array('class'=>'form-control')); ?>
				<?php echo $form->labelEx($model, 'publish'); ?>
				<?php echo $form->error($model,'publish'); ?>
			</div>
		</div>
		<?php }?>

	</fieldset>
</div>
<div class="dialog-submit">
	<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('phrase', 'Create') : Yii::t('phrase', 'Save') ,array('onclick' => 'setEnableSave()')); ?>
	<?php echo CHtml::button(Yii::t('phrase', 'Close'), array('id'=>'closed')); ?>
</div>
<?php $this->endWidget(); ?>

