<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\QuestionSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="question-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'description') ?>

		<?= $form->field($model, 'answer') ?>

		<?= $form->field($model, 'answer_options') ?>

		<?= $form->field($model, 'question_type_id') ?>

		<?php // echo $form->field($model, 'answer_explanation') ?>

		<?php // echo $form->field($model, 'subject_id') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
