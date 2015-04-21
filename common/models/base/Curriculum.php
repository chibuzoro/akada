<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "curriculum".
 *
 * @property integer $id
 * @property string $curriculum_title
 * @property integer $created_by
 * @property string $create_date
 * @property integer $course_id
 *
 * @property Profile $createdBy
 * @property Course $course
 * @property Subject[] $subjects
 */
class Curriculum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'curriculum';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'curriculum_title', 'created_by', 'create_date', 'course_id'], 'required'],
            [['id', 'created_by', 'course_id'], 'integer'],
            [['create_date'], 'safe'],
            [['curriculum_title'], 'string', 'max' => 255],
            [['curriculum_title'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'curriculum_title' => Yii::t('app', 'Curriculum Title'),
            'created_by' => Yii::t('app', 'Created By'),
            'create_date' => Yii::t('app', 'Create Date'),
            'course_id' => Yii::t('app', 'Course ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(\common\models\Profile::className(), ['id' => 'created_by']);
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
    public function getSubjects()
    {
        return $this->hasMany(\common\models\Subject::className(), ['curriculum_id' => 'id']);
    }
}
