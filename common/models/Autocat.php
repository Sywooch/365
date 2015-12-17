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
 * @property string $maxpas
 * @property string $photo
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
            [['name_ru', 'name_en', 'name_az', 'maxpas', 'photo'], 'string', 'max' => 45]
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
            'maxpas' => Yii::t('yii', 'Maxpas'),
            'photo' => Yii::t('yii', 'Photo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutos()
    {
        return $this->hasMany(Auto::className(), ['idcat' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrices()
    {
        return $this->hasMany(Price::className(), ['catid' => 'id']);
    }

    /**
     * @inheritdoc
     * @return AutocatQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AutocatQuery(get_called_class());
    }
}
