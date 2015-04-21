<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $password_hash
 * @property string $auth_key
 * @property string $status
 * @property string $password_reset_token
 * @property string $email
 * @property string $updated_at
 * @property string $created_at
 * @property string $lastlogin_at
 *
 * @property Notification[] $notifications
 * @property Comments[] $comments
 * @property Profile $profile
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'username', 'password', 'password_hash', 'auth_key'], 'required'],
            [['id'], 'integer'],
            [['auth_key'], 'string'],
            [['updated_at', 'created_at', 'lastlogin_at'], 'safe'],
            [['username', 'password', 'password_hash', 'status', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['username'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'status' => Yii::t('app', 'Status'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_at' => Yii::t('app', 'Created At'),
            'lastlogin_at' => Yii::t('app', 'Lastlogin At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications()
    {
        return $this->hasMany(\common\models\Notification::className(), ['notice_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(\common\models\Comments::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(\common\models\Profile::className(), ['id' => 'id']);
    }
}
