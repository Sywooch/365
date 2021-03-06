<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sifarish".
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
 * @property string $gsign
 * @property string $address
 */
class Sifarish extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $date;
    public $time;
    public static function tableName()
    {
        return 'sifarish';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'passangers', 'pickuptime', 'car', 'amount', 'seat','date','time'], 'integer'],
            [['lastname', 'firstname', 'email', 'phone', 'from', 'to', 'pickuptime', 'car', 'amount' ,'date' ,'time'], 'required'],
            [['type', 'return'], 'string'],
            [['lastname', 'firstname', 'email', 'flightnumber', 'gsign'], 'string', 'max' => 45],
            [['phone', 'phone1'], 'string', 'max' => 15],
            [['notes'], 'string', 'max' => 255],
            [['from', 'to', 'anotherd', 'anotherd1', 'anotherd2', 'address'], 'string', 'max' => 100],
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
            'firstname' => Yii::t('yii', 'Firstname'),
            'email' => Yii::t('yii', 'Email'),
            'phone' => Yii::t('yii', 'Phone'),
            'phone1' => Yii::t('yii', 'Phone1'),
            'flightnumber' => Yii::t('yii', 'Flightnumber'),
            'passangers' => Yii::t('yii', 'Passangers'),
            'notes' => Yii::t('yii', 'Notes'),
            'type' => Yii::t('yii', 'Type'),
            'from' => Yii::t('yii', 'From'),
            'to' => Yii::t('yii', 'To'),
            'anotherd' => Yii::t('yii', 'Anotherd'),
            'anotherd1' => Yii::t('yii', 'Anotherd1'),
            'anotherd2' => Yii::t('yii', 'Anotherd2'),
            'pickuptime' => Yii::t('yii', 'Pickuptime'),
            'car' => Yii::t('yii', 'Car'),
            'amount' => Yii::t('yii', 'Amount'),
            'currency' => Yii::t('yii', 'Currency'),
            'return' => Yii::t('yii', 'Return'),
            'seat' => Yii::t('yii', 'Seat'),
            'gsign' => Yii::t('yii', 'Gsign'),
            'address' => Yii::t('yii', 'Address'),
        ];
    }
}
