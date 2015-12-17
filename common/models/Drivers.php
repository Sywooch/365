<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "drivers".
 *
 * @property integer $id
 * @property string $fullname
 * @property string $sname
 * @property string $fname
 * @property string $address
 * @property string $address1
 * @property string $idcardN
 * @property string $photo
 * @property string $phone
 * @property string $phone1
 * @property string $email
 * @property integer $car
 * @property string $bday
 * @property integer $count
 *
 * @property Auto $car0
 */
class Drivers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'drivers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           
            [['car', 'count'], 'integer'],
            [['fullname', 'sname', 'fname', 'address', 'address1', 'idcardN', 'photo', 'phone', 'phone1', 'email', 'bday'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'fullname' => Yii::t('yii', 'Adı'),
            'sname' => Yii::t('yii', 'Soyadı'),
            'fname' => Yii::t('yii', 'Atasının adı'),
            'address' => Yii::t('yii', 'Ünvani'),
            'address1' => Yii::t('yii', 'Ünvani elavə'),
            'idcardN' => Yii::t('yii', 'Şəxsiyyət vəsiqəsinin seriya nömrəsi'),
            'photo' => Yii::t('yii', 'Şəkli'),
            'phone' => Yii::t('yii', 'Mobil nömrə'),
            'phone1' => Yii::t('yii', 'Telefon'),
            'email' => Yii::t('yii', 'Email'),
            'car' => Yii::t('yii', 'Avtomobili'),
            'bday' => Yii::t('yii', 'Doğum günü'),
            'count' => Yii::t('yii', 'Sifarişlərinin sayı'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCar0()
    {
        return $this->hasOne(Auto::className(), ['id' => 'car']);
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
