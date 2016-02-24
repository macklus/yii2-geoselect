<?php

namespace macklus\geoselect\models;

use Yii;

/**
 * This is the model class for table "geo_country".
 *
 * @property integer $id
 * @property string $name
 *
 * @property GeoLocation[] $geoLocations
 * @property GeoProvince[] $geoProvinces
 */
class GeoCountry extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'geo_country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    public function afterFind()
    {
        if (parent::afterFind()) {
            $this->name = htmlspecialchars_decode($this->name);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeoLocations()
    {
        return $this->hasMany(GeoLocation::className(), ['country_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeoProvinces()
    {
        return $this->hasMany(GeoProvince::className(), ['country_id' => 'id']);
    }

    public static function getDropDown()
    {
        $items = GeoCountry::find()->asArray()->all();
        $data = [];
        foreach ($items as $i) {
            $data[] = ['id' => $i['id'], 'name' => html_entity_decode($i['name'], ENT_COMPAT, 'UTF-8')];
        }
        return $data;
    }
}
