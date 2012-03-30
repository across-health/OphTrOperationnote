<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2012
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2012, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

/**
 * This is the model class for table "element_procedurelist".
 *
 * The followings are the available columns in table 'element_operation':
 * @property string $id
 * @property integer $event_id
 * @property integer $surgeon_id
 * @property integer $assistant_id
 * @property integer $anaesthetic_type
 *
 * The followings are the available model relations:
 * @property Event $event
 */
class ElementCataract extends BaseEventTypeElement
{
	public $service;
	public $complication_fields = array('wound_burn','iris_trauma','zonular_dialysis','pc_rupture','decentered_iol','iol_exchange','dropped_nucleus','op_cancelled','corneal_odema','iris_prolapse','zonular_rupture','vitreous_loss','iol_into_vitreous','other_iol_problem','choroidal_haem');

	/**
	 * Returns the static model of the specified AR class.
	 * @return ElementOperation the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'et_ophtroperationnote_cataract';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, incision_site_id, length, meridian, incision_type_id, iol_position_id, eyedraw, report, wound_burn, iris_trauma, zonular_dialysis, pc_rupture, decentered_iol, iol_exchange, dropped_nucleus, op_cancelled, corneal_odema, iris_prolapse, zonular_rupture, vitreous_loss, iol_into_vitreous, other_iol_problem, choroidal_haem', 'safe'),
			array('incision_site_id, length, meridian, incision_type_id, iol_position_id, eyedraw, report, wound_burn, iris_trauma, zonular_dialysis, pc_rupture, decentered_iol, iol_exchange, dropped_nucleus, op_cancelled, corneal_odema, iris_prolapse, zonular_rupture, vitreous_loss, iol_into_vitreous, other_iol_problem, choroidal_haem', 'required'),
			array('length', 'numerical', 'integerOnly' => false, 'numberPattern' => '/^[0-9](\.[0-9])?$/', 'message' => 'Length must be 0 - 9.9 in increments of 0.1'),
			array('meridian', 'numerical', 'integerOnly' => false, 'numberPattern' => '/^[0-9]{1,3}(\.[0-9])?$/', 'min' => 000.5, 'max' => 180, 'message' => 'Meridian must be 000.5 - 180.0 degrees'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			//array('id, event_id, incision_site_id, length, meridian, incision_type_id, eyedraw, report, wound_burn, iris_trauma, zonular_dialysis, pc_rupture, decentered_iol, iol_exchange, dropped_nucleus, op_cancelled, corneal_odema, iris_prolapse, zonular_rupture, vitreous_loss, iol_into_vitreous, other_iol_problem, choroidal_haem', 'on' => 'search'),
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
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'incision_type' => array(self::BELONGS_TO, 'IncisionType', 'incision_type_id'),
			'incision_site' => array(self::BELONGS_TO, 'IncisionSite', 'incision_site_id'),
			'iol_position' => array(self::BELONGS_TO, 'IOLPosition', 'iol_position_id'),
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
			'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'incision_site_id' => 'Incision site',
			'incision_type_id' => 'Incision type',
			'iol_position_id' => 'IOL Position',
			'length' => 'Length',
			'meridian' => 'Meridian',
			'report' => 'Report',
			'wound_burn' => 'Wound burn',
			'iris_trauma' => 'Iris trauma',
			'zonular_dialysis' => 'Zonular dialysis',
			'pc_rupture' => 'PC rupture',
			'decentered_iol' => 'Decentered IOL',
			'iol_exchange' => 'IOL exchange',
			'dropped_nucleus' => 'Dropped nucleus',
			'op_cancelled' => 'Op cancelled',
			'corneal_odema' => 'Corneal odema',
			'iris_prolapse' => 'Iris prolapse',
			'zonular_rupture' => 'Zonular rupture',
			'vitreous_loss' => 'Vitreous loss',
			'iol_into_vitreous' => 'IOL into vitreous',
			'other_iol_problem' => 'Other IOL problem',
			'choroidal_haem' => 'Choroidal haem',
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

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('event_id', $this->event_id, true);
		
		return new CActiveDataProvider(get_class($this), array(
				'criteria' => $criteria,
			));
	}

	/**
	 * Set default values for forms on create
	 */
	public function setDefaultOptions()
	{
	}

	protected function beforeSave()
	{
		return parent::beforeSave();
	}

	protected function afterSave()
	{
		return parent::afterSave();
	}

	protected function beforeValidate()
	{
		return parent::beforeValidate();
	}

	public function getComplications() {
		$complications = array();

		foreach ($this->complication_fields as $field) {
			if ($this->$field) {
				$complications[] = $this->getAttributeLabel($field);
			}
		}

		return $complications;
	}
}