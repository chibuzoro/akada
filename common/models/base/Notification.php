<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "notification".
 *
 * @property integer $id
 * @property string $create_date
 * @property string $read_date
 * @property string $status
 * @property integer $notice_by
 *
 * @property User $noticeBy
 */
class Notification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'create_date', 'read_date', 'status', 'notice_by'], 'required'],
            [['id', 'notice_by'], 'integer'],
            [['create_date', 'read_date'], 'safe'],
            [['status'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'create_date' => Yii::t('app', 'Create Date'),
            'read_date' => Yii::t('app', 'Read Date'),
            'status' => Yii::t('app', 'Status'),
            'notice_by' => Yii::t('app', 'Notice By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoticeBy()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'notice_by']);
    }
}
