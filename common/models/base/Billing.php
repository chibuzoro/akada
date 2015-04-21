<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "billing".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $address
 * @property integer $phone_no
 *
 * @property Profile $user
 */
class Billing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'billing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'address', 'phone_no'], 'required'],
            [['id', 'user_id', 'phone_no'], 'integer'],
            [['address'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'address' => Yii::t('app', 'Address'),
            'phone_no' => Yii::t('app', 'Phone No'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\common\models\Profile::className(), ['id' => 'user_id']);
    }
}
