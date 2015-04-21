<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

/**
 * UserSearch represents the model behind the search form about User.
 */
class UserSearch extends Model
{
	public $id;
	public $username;
	public $password;
	public $password_hash;
	public $auth_key;
	public $status;
	public $password_reset_token;
	public $email;
	public $updated_at;
	public $created_at;
	public $lastlogin_at;

	public function rules()
	{
		return [
			[['id'], 'integer'],
			[['username', 'password', 'password_hash', 'auth_key', 'status', 'password_reset_token', 'email', 'updated_at', 'created_at', 'lastlogin_at'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'password_hash' => 'Password Hash',
			'auth_key' => 'Auth Key',
			'status' => 'Status',
			'password_reset_token' => 'Password Reset Token',
			'email' => 'Email',
			'updated_at' => 'Updated At',
			'created_at' => 'Created At',
			'lastlogin_at' => 'Lastlogin At',
		];
	}

	public function search($params)
	{
		$query = User::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'id' => $this->id,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'lastlogin_at' => $this->lastlogin_at,
        ]);

		$query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email]);

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
