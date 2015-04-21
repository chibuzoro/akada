<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Question;

/**
 * QuestionSearch represents the model behind the search form about Question.
 */
class QuestionSearch extends Model
{
	public $id;
	public $description;
	public $answer;
	public $answer_options;
	public $question_type_id;
	public $answer_explanation;
	public $subject_id;

	public function rules()
	{
		return [
			[['id', 'question_type_id', 'subject_id'], 'integer'],
			[['description', 'answer', 'answer_options', 'answer_explanation'], 'safe'],
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
			'answer' => 'Answer',
			'answer_options' => 'Answer Options',
			'question_type_id' => 'Question Type ID',
			'answer_explanation' => 'Answer Explanation',
			'subject_id' => 'Subject ID',
		];
	}

	public function search($params)
	{
		$query = Question::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'id' => $this->id,
            'question_type_id' => $this->question_type_id,
            'subject_id' => $this->subject_id,
        ]);

		$query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'answer', $this->answer])
            ->andFilterWhere(['like', 'answer_options', $this->answer_options])
            ->andFilterWhere(['like', 'answer_explanation', $this->answer_explanation]);

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
