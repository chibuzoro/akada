<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "question".
 *
 * @property integer $id
 * @property string $description
 * @property string $answer
 * @property string $answer_options
 * @property integer $question_type_id
 * @property string $answer_explanation
 * @property integer $subject_id
 *
 * @property QuestionType $questionType
 * @property Subject $subject
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'description', 'answer', 'answer_options', 'question_type_id', 'answer_explanation', 'subject_id'], 'required'],
            [['id', 'question_type_id', 'subject_id'], 'integer'],
            [['description', 'answer', 'answer_options', 'answer_explanation'], 'string', 'max' => 255]
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
            'answer' => Yii::t('app', 'Answer'),
            'answer_options' => Yii::t('app', 'Answer Options'),
            'question_type_id' => Yii::t('app', 'Question Type ID'),
            'answer_explanation' => Yii::t('app', 'Answer Explanation'),
            'subject_id' => Yii::t('app', 'Subject ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionType()
    {
        return $this->hasOne(\common\models\QuestionType::className(), ['id' => 'question_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(\common\models\Subject::className(), ['id' => 'subject_id']);
    }
}
