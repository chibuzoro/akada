<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "course".
 *
 * @property integer $id
 * @property string $course_title
 * @property integer $sub_category_id
 * @property string $create_date
 * @property string $update_date
 * @property string $course_summary
 * @property string $price
 * @property integer $created_by
 * @property integer $is_publish
 * @property string $course_objectives
 * @property string $course_preview
 *
 * @property Curriculum[] $curriculums
 * @property Subject[] $subjects
 * @property StudentCourse[] $studentCourses
 * @property Profile $createdBy
 * @property CourseSubCategory $subCategory
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'course_title', 'sub_category_id', 'create_date', 'update_date', 'course_summary', 'price', 'created_by', 'is_publish', 'course_objectives', 'course_preview'], 'required'],
            [['id', 'sub_category_id', 'created_by', 'is_publish'], 'integer'],
            [['create_date', 'update_date'], 'safe'],
            [['price'], 'number'],
            [['course_title', 'course_summary', 'course_objectives', 'course_preview'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'course_title' => Yii::t('app', 'Course Title'),
            'sub_category_id' => Yii::t('app', 'Sub Category ID'),
            'create_date' => Yii::t('app', 'Create Date'),
            'update_date' => Yii::t('app', 'Update Date'),
            'course_summary' => Yii::t('app', 'Course Summary'),
            'price' => Yii::t('app', 'Price'),
            'created_by' => Yii::t('app', 'Created By'),
            'is_publish' => Yii::t('app', 'Is Publish'),
            'course_objectives' => Yii::t('app', 'Course Objectives'),
            'course_preview' => Yii::t('app', 'Course Preview'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurriculums()
    {
        return $this->hasMany(\common\models\Curriculum::className(), ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(\common\models\Subject::className(), ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentCourses()
    {
        return $this->hasMany(\common\models\StudentCourse::className(), ['course_id' => 'id']);
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
    public function getSubCategory()
    {
        return $this->hasOne(\common\models\CourseSubCategory::className(), ['id' => 'sub_category_id']);
    }
}
