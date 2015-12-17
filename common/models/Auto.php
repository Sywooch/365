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
 *
 * @property Autocat $idcat0
 * @property Drivers[] $drivers
 * @property Sifarish[] $sifarishes
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
            [['idcat', 'name', 'photo'], 'required'],
            [['idcat'], 'integer'],
            [['name', 'photo', 'carnumber'], 'string', 'max' => 45]
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSifarishes()
    {
        return $this->hasMany(Sifarish::className(), ['car' => 'id']);
    }

    /**
     * @inheritdoc
     * @return AutoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AutoQuery(get_called_class());
    }
}
