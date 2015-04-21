<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "subject".
 *
 * @property integer $id
 * @property integer $course_id
 * @property string $subject_title
 * @property string $price
 * @property integer $curriculum_id
 * @property string $content_type
 * @property string $content_location
 * @property string $content_length
 * @property string $date_uploaded
 *
 * @property Course $course
 * @property Curriculum $curriculum
 * @property Question[] $questions
 * @property Comments[] $comments
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'course_id', 'subject_title', 'price', 'curriculum_id', 'content_type', 'content_location', 'content_length', 'date_uploaded'], 'required'],
            [['id', 'course_id', 'curriculum_id'], 'integer'],
            [['price'], 'number'],
            [['content_length'], 'string'],
            [['date_uploaded'], 'safe'],
            [['subject_title', 'content_type', 'content_location'], 'string', 'max' => 255],
            [['subject_title', 'course_id', 'curriculum_id'], 'unique', 'targetAttribute' => ['subject_title', 'course_id', 'curriculum_id'], 'message' => 'The combination of Course ID, Subject Title and Curriculum ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'course_id' => Yii::t('app', 'Course ID'),
            'subject_title' => Yii::t('app', 'Subject Title'),
            'price' => Yii::t('app', 'Price'),
            'curriculum_id' => Yii::t('app', 'Curriculum ID'),
            'content_type' => Yii::t('app', 'Content Type'),
            'content_location' => Yii::t('app', 'Content Location'),
            'content_length' => Yii::t('app', 'Content Length'),
            'date_uploaded' => Yii::t('app', 'Date Uploaded'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(\common\models\Course::className(), ['id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurriculum()
    {
        return $this->hasOne(\common\models\Curriculum::className(), ['id' => 'curriculum_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(\common\models\Question::className(), ['subject_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(\common\models\Comments::className(), ['subject_id' => 'id']);
    }
}
