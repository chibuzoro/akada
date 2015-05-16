<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CourseSubCategory;

/**
 * CourseSubCategorySearch represents the model behind the search form about CourseSubCategory.
 */
class CourseSubCategorySearch extends Model
{
	public $id;
	public $description;
	public $course_category;

	public function rules()
	{
		return [
            [['id'], 'integer'],
            [['description', 'course_category'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'description' => 'Description',
			'course_category' => 'Course Category',
		];
	}

	public function search($params)
	{
		$query = CourseSubCategory::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'id' => $this->id,
            'course_category' => $this->course_category,
        ]);

		$query->andFilterWhere(['like', 'description', $this->description]);

		return $dataProvider;
	}

	protected function addCondition($query, $attribute, $partialMatch = false)
	{
		$value = $this->$attribute;
		if (trim($value) === '') {
			return;
		}
		if ($partialMatch) {
			$value = '%' . strtr($value, ['%'=>'\%', '_'=>'\_', '\\'=>'\\\\']) . '%';
			$query->andWhere(['like', $attribute, $value]);
		} else {
			$query->andWhere([$attribute => $value]);
		}
	}
}
