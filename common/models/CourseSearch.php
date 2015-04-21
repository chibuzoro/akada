<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Course;

/**
 * CourseSearch represents the model behind the search form about Course.
 */
class CourseSearch extends Model
{
	public $id;
	public $course_title;
	public $sub_category_id;
	public $create_date;
	public $update_date;
	public $course_summary;
	public $price;
	public $created_by;
	public $is_publish;
	public $course_objectives;
	public $course_preview;

	public function rules()
	{
		return [
			[['id', 'sub_category_id', 'created_by', 'is_publish'], 'integer'],
			[['course_title', 'create_date', 'update_date', 'course_summary', 'course_objectives', 'course_preview'], 'safe'],
			[['price'], 'number'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'course_title' => 'Course Title',
			'sub_category_id' => 'Sub Category ID',
			'create_date' => 'Create Date',
			'update_date' => 'Update Date',
			'course_summary' => 'Course Summary',
			'price' => 'Price',
			'created_by' => 'Created By',
			'is_publish' => 'Is Publish',
			'course_objectives' => 'Course Objectives',
			'course_preview' => 'Course Preview',
		];
	}

	public function search($params)
	{
		$query = Course::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'id' => $this->id,
            'sub_category_id' => $this->sub_category_id,
            'create_date' => $this->create_date,
            'update_date' => $this->update_date,
            'price' => $this->price,
            'created_by' => $this->created_by,
            'is_publish' => $this->is_publish,
        ]);

		$query->andFilterWhere(['like', 'course_title', $this->course_title])
            ->andFilterWhere(['like', 'course_summary', $this->course_summary])
            ->andFilterWhere(['like', 'course_objectives', $this->course_objectives])
            ->andFilterWhere(['like', 'course_preview', $this->course_preview]);

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
