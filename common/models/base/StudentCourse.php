<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "student_course".
 *
 * @property integer $id
 * @property integer $course_id
 * @property integer $student_id
 * @property string $enroll_date
 * @property string $finish_date
 * @property string $completion_status
 *
 * @property Course $course
 * @property Profile $student
 */
class StudentCourse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'course_id', 'student_id', 'enroll_date', 'completion_status'], 'required'],
            [['id', 'course_id', 'student_id'], 'integer'],
            [['enroll_date', 'finish_date'], 'safe'],
            [['completion_status'], 'string', 'max' => 255],
            [['course_id', 'student_id'], 'unique', 'targetAttribute' => ['course_id', 'student_id'], 'message' => 'The combination of Course ID and Student ID has already been taken.']
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
            'student_id' => Yii::t('app', 'Student ID'),
            'enroll_date' => Yii::t('app', 'Enroll Date'),
            'finish_date' => Yii::t('app', 'Finish Date'),
            'completion_status' => Yii::t('app', 'Completion Status'),
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
    public function getStudent()
    {
        return $this->hasOne(\common\models\Profile::className(), ['id' => 'student_id']);
    }
}
