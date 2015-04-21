<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "comments".
 *
 * @property integer $id
 * @property string $comment
 * @property integer $subject_id
 * @property string $comment_title
 * @property string $comment_post_date
 * @property integer $comment_trail_id
 * @property integer $user_id
 * @property string $comment_status
 *
 * @property User $user
 * @property Subject $subject
 * @property Comments $commentTrail
 * @property Comments[] $comments
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'comment', 'subject_id', 'comment_title', 'comment_post_date', 'user_id', 'comment_status'], 'required'],
            [['id', 'subject_id', 'comment_trail_id', 'user_id'], 'integer'],
            [['comment_post_date'], 'safe'],
            [['comment', 'comment_title'], 'string', 'max' => 255],
            [['comment_status'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'comment' => Yii::t('app', 'Comment'),
            'subject_id' => Yii::t('app', 'Subject ID'),
            'comment_title' => Yii::t('app', 'Comment Title'),
            'comment_post_date' => Yii::t('app', 'Comment Post Date'),
            'comment_trail_id' => Yii::t('app', 'Comment Trail ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'comment_status' => Yii::t('app', 'Comment Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(\common\models\Subject::className(), ['id' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentTrail()
    {
        return $this->hasOne(\common\models\Comments::className(), ['id' => 'comment_trail_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(\common\models\Comments::className(), ['comment_trail_id' => 'id']);
    }
}
