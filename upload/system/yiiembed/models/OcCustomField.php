<?php
/**
 * OcCustomField
 *
 * --- BEGIN ModelDoc ---
 *
 * Table {{custom_field}}
 * @property integer $custom_field_id
 * @property string $type
 * @property string $value
 * @property integer $required
 * @property string $location
 * @property integer $position
 * @property integer $sort_order
 *
 * Relations
 * @property \OcLanguage[] $languages
 * @property \OcCustomerGroup[] $customerGroups
 * @property \OcCustomFieldValue[] $customFieldValues
 * @property \OcCustomerField[] $customerFields
 * @property \OcOrderField[] $orderFields
 *
 * @see \CActiveRecord
 * @method \OcCustomField find($condition = '', array $params = array())
 * @method \OcCustomField findByPk($pk, $condition = '', array $params = array())
 * @method \OcCustomField findByAttributes(array $attributes, $condition = '', array $params = array())
 * @method \OcCustomField findBySql($sql, array $params = array())
 * @method \OcCustomField[] findAll($condition = '', array $params = array())
 * @method \OcCustomField[] findAllByPk($pk, $condition = '', array $params = array())
 * @method \OcCustomField[] findAllByAttributes(array $attributes, $condition = '', array $params = array())
 * @method \OcCustomField[] findAllBySql($sql, array $params = array())
 * @method \OcCustomField with()
 * @method \OcCustomField together()
 * @method \OcCustomField cache($duration, $dependency = null, $queryCount = 1)
 * @method \OcCustomField resetScope($resetDefault = true)
 * @method \OcCustomField populateRecord($attributes, $callAfterFind = true)
 * @method \OcCustomField[] populateRecords($data, $callAfterFind = true, $index = null)
 *
 * --- END ModelDoc ---
 */

class OcCustomField extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return OcCustomField the static model class
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
        return '{{custom_field}}';
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'languages' => array(self::MANY_MANY, 'OcLanguage', '{{custom_field_description}}(custom_field_id, language_id)'),
            'customerGroups' => array(self::MANY_MANY, 'OcCustomerGroup', '{{custom_field_to_customer_group}}(custom_field_id, customer_group_id)'),
            'customFieldValues' => array(self::HAS_MANY, 'OcCustomFieldValue', 'custom_field_id'),
            'customerFields' => array(self::HAS_MANY, 'OcCustomerField', 'custom_field_id'),
            'orderFields' => array(self::HAS_MANY, 'OcOrderField', 'custom_field_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'custom_field_id' => Yii::t('app', 'Custom Field'),
            'type' => Yii::t('app', 'Type'),
            'value' => Yii::t('app', 'Value'),
            'required' => Yii::t('app', 'Required'),
            'location' => Yii::t('app', 'Location'),
            'position' => Yii::t('app', 'Position'),
            'sort_order' => Yii::t('app', 'Sort Order'),
        );
    }

}

