<?php
/**
 * SupportContactCategory
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2012 Ommu Platform (ommu.co)
 * @link https://github.com/oMMu/Ommu-Support
 * @contact (+62)856-299-4114
 *
 * This is the template for generating the model class of a specified table.
 * - $this: the ModelCode object
 * - $tableName: the table name for this class (prefix is already removed if necessary)
 * - $modelClass: the model class name
 * - $columns: list of table columns (name=>CDbColumnSchema)
 * - $labels: list of attribute labels (name=>label)
 * - $rules: list of validation rules
 * - $relations: list of relations (name=>relation declaration)
 *
 * --------------------------------------------------------------------------------------
 *
 * This is the model class for table "ommu_support_contact_category".
 *
 * The followings are the available columns in table 'ommu_support_contact_category':
 * @property integer $cat_id
 * @property integer $publish
 * @property integer $orders
 * @property string $icons
 * @property integer $name
 * @property string $creation_date
 * @property string $creation_id
 * @property string $modified_date
 * @property string $modified_id
 *
 * The followings are the available model relations:
 * @property OmmuSupportContacts[] $ommuSupportContacts
 */
class SupportContactCategory extends CActiveRecord
{
	public $defaultColumns = array();
	public $title;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SupportContactCategory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ommu_support_contact_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('publish, orders, name, creation_id, modified_id', 'numerical', 'integerOnly'=>true),
			array('title, icons', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cat_id, publish, orders, icons, name, creation_date, creation_id, modified_date, modified_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			//'ommuSupportContacts' => array(self::HAS_MANY, 'OmmuSupportContacts', 'cat_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cat_id' => Phrase::trans(23066,1),
			'publish' => Phrase::trans(23095,1),
			'orders' => Phrase::trans(23096,1),
			'icons' => Phrase::trans(23097,1),
			'name' => Phrase::trans(23066,1),
			'creation_date' => 'Creation',
			'creation_id' => 'Creation',
			'modified_date' => 'Modified',
			'modified_id' => 'Modified',
			'title' => Phrase::trans(23066,1),
		);
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('t.cat_id',$this->cat_id);
		if(isset($_GET['type']) && $_GET['type'] == 'publish') {
			$criteria->compare('t.publish',1);
		} elseif(isset($_GET['type']) && $_GET['type'] == 'unpublish') {
			$criteria->compare('t.publish',0);
		} elseif(isset($_GET['type']) && $_GET['type'] == 'nopublish') {
			$criteria->compare('t.publish',2);
		} else {
			$criteria->addInCondition('t.publish',array(0,1,2));
			$criteria->compare('t.publish',$this->publish);
		}
		$criteria->compare('t.orders',$this->orders);
		$criteria->compare('t.icons',$this->icons,true);
		$criteria->compare('t.name',$this->name);
		if($this->creation_date != null && !in_array($this->creation_date, array('0000-00-00 00:00:00', '0000-00-00')))
			$criteria->compare('date(t.creation_date)',date('Y-m-d', strtotime($this->creation_date)));
		$criteria->compare('t.creation_id',$this->creation_id);
		if($this->modified_date != null && !in_array($this->modified_date, array('0000-00-00 00:00:00', '0000-00-00')))
			$criteria->compare('date(t.modified_date)',date('Y-m-d', strtotime($this->modified_date)));
		$criteria->compare('t.modified_id',$this->modified_id);
		
		if(!isset($_GET['SupportContactCategory_sort'])) {
			$criteria->order = 'cat_id DESC';
		}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>20,
			),
		));
	}


	/**
	 * Get column for CGrid View
	 */
	public function getGridColumn($columns=null) {
		if($columns !== null) {
			foreach($columns as $val) {
				/*
				if(trim($val) == 'enabled') {
					$this->defaultColumns[] = array(
						'name'  => 'enabled',
						'value' => '$data->enabled == 1? "Ya": "Tidak"',
					);
				}
				*/
				$this->defaultColumns[] = $val;
			}
		}else {
			//$this->defaultColumns[] = 'cat_id';
			$this->defaultColumns[] = 'publish';
			$this->defaultColumns[] = 'orders';
			$this->defaultColumns[] = 'icons';
			$this->defaultColumns[] = 'name';
			$this->defaultColumns[] = 'creation_date';
			$this->defaultColumns[] = 'creation_id';
			$this->defaultColumns[] = 'modified_date';
			$this->defaultColumns[] = 'modified_id';
		}

		return $this->defaultColumns;
	}

	/**
	 * Set default columns to display
	 */
	protected function afterConstruct() {
		if(count($this->defaultColumns) == 0) {
			$this->defaultColumns[] = array(
				'header' => 'No',
				'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1'
			);
			$this->defaultColumns[] = array(
				'name' => 'name',
				'value' => 'Phrase::trans($data->name, 2)',
			);
			$this->defaultColumns[] = 'icons';
			$this->defaultColumns[] = array(
				'name' => 'publish',
				'value' => '$data->publish == 2 ? "-" : Utility::getPublish(Yii::app()->controller->createUrl("publish",array("id"=>$data->cat_id)), $data->publish, 1) ',
				'htmlOptions' => array(
					'class' => 'center',
				),
				'type' => 'raw',
			);

		}
		parent::afterConstruct();
	}

	/**
	 * Get category
	 * 0 = unpublish
	 * 1 = publish
	 */
	public static function getCategory($publish=null) {
		if($publish == null) {
			$model = self::model()->findAll();
		} else {
			$model = self::model()->findAll(array(
				//'select' => 'publish, name',
				'condition' => 'publish = :publish',
				'params' => array(
					':publish' => $publish,
				),
				//'order' => 'cat_id ASC'
			));
		}

		$items = array();
		if($model != null) {
			foreach($model as $key => $val) {
				$items[$val->cat_id] = Phrase::trans($val->name, 2);
			}
			return $items;
		} else {
			return false;
		}
	}
	
	/**
	 * before save attributes
	 */
	protected function beforeSave() {
		if(parent::beforeSave()) {
			$action = strtolower(Yii::app()->controller->action->id);
			if($this->isNewRecord) {
				$currentAction = strtolower(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id);
				$title=new OmmuSystemPhrase;
				$title->location = $currentAction;
				$title->en = $this->title;
				if($title->save()) {
					$this->name = $title->phrase_id;
				}
				$this->creation_id = Yii::app()->user->id;	
			
			} else {
				if($action == 'edit') {
					$title = OmmuSystemPhrase::model()->findByPk($this->name);
					$title->en = $this->title;
					$title->save();
				}
				$this->modified_id = Yii::app()->user->id;
			}			
		}
		return true;
	}
}