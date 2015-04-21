<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "course_category".
 *
 * @property integer $id
 * @property string $description
 *
 * @property CourseSubCategory[] $courseSubCategories
 */
class CourseCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'description'], 'required'],
            [['id'], 'integer'],
            [['description'], 'string', 'max' => 128],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseSubCategories()
    {
        return $this->hasMany(\common\models\CourseSubCategory::className(), ['course_category' => 'id']);
    }
}
