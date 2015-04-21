<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\SubjectSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="subject-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'course_id') ?>

		<?= $form->field($model, 'subject_title') ?>

		<?= $form->field($model, 'price') ?>

		<?= $form->field($model, 'curriculum_id') ?>

		<?php // echo $form->field($model, 'content_type') ?>

		<?php // echo $form->field($model, 'content_location') ?>

		<?php // echo $form->field($model, 'content_length') ?>

		<?php // echo $form->field($model, 'date_uploaded') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
