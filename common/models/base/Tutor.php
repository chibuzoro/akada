<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "tutor".
 *
 * @property integer $id
 * @property string $instructor_since
 *
 * @property Profile $id0
 */
class Tutor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tutor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'instructor_since'], 'required'],
            [['id'], 'integer'],
            [['instructor_since'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'instructor_since' => Yii::t('app', 'Instructor Since'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(\common\models\Profile::className(), ['id' => 'id']);
    }
}
