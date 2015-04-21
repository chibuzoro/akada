<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\CourseSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="course-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'course_title') ?>

		<?= $form->field($model, 'sub_category_id') ?>

		<?= $form->field($model, 'create_date') ?>

		<?= $form->field($model, 'update_date') ?>

		<?php // echo $form->field($model, 'course_summary') ?>

		<?php // echo $form->field($model, 'price') ?>

		<?php // echo $form->field($model, 'created_by') ?>

		<?php // echo $form->field($model, 'is_publish') ?>

		<?php // echo $form->field($model, 'course_objectives') ?>

		<?php // echo $form->field($model, 'course_preview') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
