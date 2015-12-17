<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%sifarish}}".
 *
 * @property integer $id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $lastname
 * @property string $firstname
 * @property string $email
 * @property string $phone
 * @property string $phone1
 * @property string $flightnumber
 * @property integer $passangers
 * @property string $notes
 * @property string $type
 * @property string $from
 * @property string $to
 * @property string $anotherd
 * @property string $anotherd1
 * @property string $anotherd2
 * @property integer $pickuptime
 * @property integer $car
 * @property integer $amount
 * @property string $currency
 * @property string $return
 * @property integer $seat
 * @property integer $arrivaltime
 * @property string $gsign
 *
 * @property Auto $car0
 */
class Sifarish extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sifarish}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'passangers', 'pickuptime', 'car', 'amount', 'seat', 'arrivaltime'], 'integer'],
            [['type', 'return'], 'string'],
            [['lastname', 'firstname', 'email', 'flightnumber', 'gsign'], 'string', 'max' => 45],
            [['phone', 'phone1'], 'string', 'max' => 15],
            [['notes'], 'string', 'max' => 255],
            [['from', 'to', 'anotherd', 'anotherd1', 'anotherd2'], 'string', 'max' => 100],
            [['currency'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'created_at' => Yii::t('yii', 'Created At'),
            'updated_at' => Yii::t('yii', 'Updated At'),
            'lastname' => Yii::t('yii', 'Lastname'),
            'firstname' => Yii::t('yii', 'full name'),
            'email' => Yii::t('yii', 'Email'),
            'phone' => Yii::t('yii', 'Phone'),
            'phone1' => Yii::t('yii', 'Phone1'),
            'flightnumber' => Yii::t('yii', 'Flightnumber'),
            'passangers' => Yii::t('yii', 'sernishin sayi'),
            'notes' => Yii::t('yii', 'haqqinda melumat'),
            'type' => Yii::t('yii', 'sifarishin novu
0=taxi sifarishi
1=surucu ve avtomobili icare goturmek'),
            'from' => Yii::t('yii', 'bu type ise sifarishiin
aeroportdan olduqu'),
            'to' => Yii::t('yii', 'To'),
            'anotherd' => Yii::t('yii', 'elave aparilacaq yer'),
            'anotherd1' => Yii::t('yii', 'elave aparilacaq yer 2'),
            'anotherd2' => Yii::t('yii', 'Anotherd2'),
            'pickuptime' => Yii::t('yii', 'Pickuptime'),
            'car' => Yii::t('yii', 'secilmish avtomobil'),
            'amount' => Yii::t('yii', 'qiymet'),
            'currency' => Yii::t('yii', 'Currency'),
            'return' => Yii::t('yii', 'Return'),
            'seat' => Yii::t('yii', 'usaq oturacaqi'),
            'arrivaltime' => Yii::t('yii', 'Arrivaltime'),
            'gsign' => Yii::t('yii', 'Salamlama'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCar0()
    {
        return $this->hasOne(Auto::className(), ['id' => 'car']);
    }
}
