<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rentorder".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $lastname
 * @property string $firstname
 * @property string $email
 * @property string $phone
 * @property string $notes
 * @property string $from
 * @property string $address
 * @property integer $pickuptime
 * @property integer $car
 * @property integer $amount
 * @property string $gsign
 * @property string $endtime
 *
 * @property Auto $car0
 */
class Rentorder extends \yii\db\ActiveRecord
{
    
    public $pickdate;
   // public $enddate;
    public $time_start;
    public $time_end;
    public $fplaceid;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rentorder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pickuptime', 'car', 'amount','endtime'], 'integer'],
            [['pickuptime','car','time_end','time_start','lastname','firstname'],'required'],
            [['created_at', 'updated_at', 'lastname', 'firstname', 'email', 'phone', 'notes', 'from', 'address'], 'string', 'max' => 100],
            [['time_start','time_end','pickdate'],'safe'],
            [['gsign'], 'string', 'max' => 100],
            [[ 'status'], 'string'],
            [['fplaceid'], 'string'],
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
            'notes' => Yii::t('yii', 'Notes'),
            'from' => Yii::t('yii', 'From'),
            'address' => Yii::t('yii', 'Address'),
            'pickuptime' => Yii::t('yii', 'Pickuptime'),
            'car' => Yii::t('yii', 'Car'),
            'amount' => Yii::t('yii', 'Amount'),
            'gsign' => Yii::t('yii', 'Gsign'),
            'endtime' => Yii::t('yii', 'Endtime'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCar0()
    {
        return $this->hasMany(Auto::className(), ['id' => 'car']);
    }
    
    public function getTime()
    {
        return $this->hasMany(Rentime::className(), ['rentid' => 'id']);
    }
}
