<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "autocat".
 *
 * @property integer $id
 * @property string $name_ru
 * @property string $name_en
 * @property string $name_az
 *
 * @property Auto[] $autos
 * @property Price[] $prices
 */
class Autocat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'autocat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_en', 'name_az'], 'required'],
            [['name_ru', 'name_en', 'name_az'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'name_ru' => Yii::t('yii', 'Name Ru'),
            'name_en' => Yii::t('yii', 'Name En'),
            'name_az' => Yii::t('yii', 'Name Az'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutos()
    {
        return $this->hasMany(Auto::className(), ['idcat' => 'id'])->orderBy(['priceT' => SORT_ASC]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrices()
    {
        return $this->hasMany(Price::className(), ['catid' => 'id']);
    }
}
