<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Curriculum;

/**
 * CurriculumSearch represents the model behind the search form about Curriculum.
 */
class CurriculumSearch extends Model
{
	public $id;
	public $curriculum_title;
	public $created_by;
	public $create_date;
	public $course_id;

	public function rules()
	{
		return [
			[['id', 'created_by', 'course_id'], 'integer'],
			[['curriculum_title', 'create_date'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'curriculum_title' => 'Curriculum Title',
			'created_by' => 'Created By',
			'create_date' => 'Create Date',
			'course_id' => 'Course ID',
		];
	}

	public function search($params)
	{
		$query = Curriculum::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'id' => $this->id,
            'created_by' => $this->created_by,
            'create_date' => $this->create_date,
            'course_id' => $this->course_id,
        ]);

		$query->andFilterWhere(['like', 'curriculum_title', $this->curriculum_title]);

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
