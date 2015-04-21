<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\CurriculumSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="curriculum-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'curriculum_title') ?>

		<?= $form->field($model, 'created_by') ?>

		<?= $form->field($model, 'create_date') ?>

		<?= $form->field($model, 'course_id') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
