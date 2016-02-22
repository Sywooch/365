<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rentime".
 *
 * @property integer $id
 * @property integer $rentid
 * @property integer $time
 *
 * @property Rentorder $rent
 */
class Rentime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rentime';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rentid', 'time_start'], 'required'],
            [['rentid', 'time_end'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'rentid' => Yii::t('yii', 'Rentid'),
            'time' => Yii::t('yii', 'Time'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRent()
    {
        return $this->hasOne(Rentorder::className(), ['id' => 'rentid']);
    }
}
