<?php

namespace macklus\geoselect\models;

use Yii;

/**
 * This is the model class for table "geo_province".
 *
 * @property integer $id
 * @property integer $country_id
 * @property string $name
 *
 * @property GeoLocation[] $geoLocations
 * @property GeoCountry $country
 */
class GeoProvince extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'geo_province';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'country_id', 'name'], 'required'],
            [['id', 'country_id'], 'integer'],
            [['name'], 'string', 'max' => 150],
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
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeoLocations()
    {
        return $this->hasMany(GeoLocation::className(), ['province_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(GeoCountry::className(), ['id' => 'country_id']);
    }
}
