<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "course_sub_category".
 *
 * @property integer $id
 * @property string $description
 * @property integer $course_category
 *
 * @property CourseCategory $courseCategory
 * @property Course[] $courses
 */
class CourseSubCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_sub_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'description', 'course_category'], 'required'],
            [['id', 'course_category'], 'integer'],
            [['description'], 'string', 'max' => 255],
            [['description'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'description' => Yii::t('app', 'Description'),
            'course_category' => Yii::t('app', 'Course Category'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseCategory()
    {
        return $this->hasOne(\common\models\CourseCategory::className(), ['id' => 'course_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(\common\models\Course::className(), ['sub_category_id' => 'id']);
    }
}
