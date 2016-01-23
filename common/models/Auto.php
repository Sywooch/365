<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "auto".
 *
 * @property integer $id
 * @property integer $idcat
 * @property string $name
 * @property string $photo
 * @property string $carnumber
 * @property integer $priceT
 * @property integer $priceC
 * @property double $cent
 * @property string $maxpas
 * @property string $active
 *
 * @property Autocat $idcat0
 * @property Drivers[] $drivers
 */
class Auto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcat', 'name', 'photo', 'priceT', 'priceC'], 'required'],
            [['idcat', 'priceT', 'priceC'], 'integer'],
            [['cent'], 'number'],
            [['active'], 'string'],
            [['name', 'photo', 'carnumber'], 'string', 'max' => 45],
            [['maxpas'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'idcat' => Yii::t('yii', 'Idcat'),
            'name' => Yii::t('yii', 'Name'),
            'photo' => Yii::t('yii', 'Photo'),
            'carnumber' => Yii::t('yii', 'Carnumber'),
            'priceT' => Yii::t('yii', 'Price T'),
            'priceC' => Yii::t('yii', 'Price C'),
            'cent' => Yii::t('yii', 'Cent'),
            'maxpas' => Yii::t('yii', 'Maxpas'),
            'active' => Yii::t('yii', 'Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdcat0()
    {
        return $this->hasOne(Autocat::className(), ['id' => 'idcat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrivers()
    {
        return $this->hasMany(Drivers::className(), ['car' => 'id']);
    }
}
