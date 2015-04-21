<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Subject;

/**
 * SubjectSearch represents the model behind the search form about Subject.
 */
class SubjectSearch extends Model
{
	public $id;
	public $course_id;
	public $subject_title;
	public $price;
	public $curriculum_id;
	public $content_type;
	public $content_location;
	public $content_length;
	public $date_uploaded;

	public function rules()
	{
		return [
			[['id', 'course_id', 'curriculum_id'], 'integer'],
			[['subject_title', 'content_type', 'content_location', 'content_length', 'date_uploaded'], 'safe'],
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
			'course_id' => 'Course ID',
			'subject_title' => 'Subject Title',
			'price' => 'Price',
			'curriculum_id' => 'Curriculum ID',
			'content_type' => 'Content Type',
			'content_location' => 'Content Location',
			'content_length' => 'Content Length',
			'date_uploaded' => 'Date Uploaded',
		];
	}

	public function search($params)
	{
		$query = Subject::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'id' => $this->id,
            'course_id' => $this->course_id,
            'price' => $this->price,
            'curriculum_id' => $this->curriculum_id,
            'date_uploaded' => $this->date_uploaded,
        ]);

		$query->andFilterWhere(['like', 'subject_title', $this->subject_title])
            ->andFilterWhere(['like', 'content_type', $this->content_type])
            ->andFilterWhere(['like', 'content_location', $this->content_location])
            ->andFilterWhere(['like', 'content_length', $this->content_length]);

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
