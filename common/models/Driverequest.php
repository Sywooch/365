<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "driverequest".
 *
 * @property integer $id
 * @property string $fullname
 * @property string $fname
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $car
 * @property integer $bday
 */
class Driverequest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'driverequest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'address', 'phone', 'email', 'car', 'bday'], 'required'],
            [['bday'], 'integer'],
            [['fullname', 'fname', 'phone', 'email', 'car'], 'string', 'max' => 45],
            [['address'], 'string', 'max' => 85]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'fullname' => Yii::t('yii', 'Fullname'),
            'fname' => Yii::t('yii', 'Fname'),
            'address' => Yii::t('yii', 'Address'),
            'phone' => Yii::t('yii', 'Phone'),
            'email' => Yii::t('yii', 'Email'),
            'car' => Yii::t('yii', 'Car'),
            'bday' => Yii::t('yii', 'Bday'),
        ];
    }
}
