<?php

namespace macklus\geoselect\models;

use Yii;

/**
 * This is the model class for table "geo_location".
 *
 * @property integer $id
 * @property integer $country_id
 * @property integer $province_id
 * @property string $name
 *
 * @property GeoProvince $province
 * @property GeoCountry $country
 */
class GeoLocation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'geo_location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'country_id', 'province_id', 'name'], 'required'],
            [['id', 'country_id', 'province_id'], 'integer'],
            [['name'], 'string', 'max' => 150],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeoProvince::className(), 'targetAttribute' => ['province_id' => 'id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeoCountry::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'country_id' => Yii::t('app', 'Country ID'),
            'province_id' => Yii::t('app', 'Province ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvince()
    {
        return $this->hasOne(GeoProvince::className(), ['id' => 'province_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(GeoCountry::className(), ['id' => 'country_id']);
    }
}
