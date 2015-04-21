<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
* @var yii\web\View $this
* @var common\models\Course $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="course-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>
        <?php $this->beginBlock('main'); ?>

        <p>
            
			<?= $form->field($model, 'id')->textInput() ?>
			<?= $form->field($model, 'course_title')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'sub_category_id')->textInput() ?>
			<?= $form->field($model, 'create_date')->textInput() ?>
			<?= $form->field($model, 'update_date')->textInput() ?>
			<?= $form->field($model, 'course_summary')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'price')->textInput() ?>
			<?= $form->field($model, 'created_by')->textInput() ?>
			<?= $form->field($model, 'is_publish')->textInput() ?>
			<?= $form->field($model, 'course_objectives')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'course_preview')->textInput(['maxlength' => 255]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    \yii\bootstrap\Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Course',
    'content' => $this->blocks['main'],
    'active'  => true,
], ]
                 ]
    );
    ?>
        <hr/>

        <?= Html::submitButton('<span class="glyphicon glyphicon-check"></span> '.($model->isNewRecord ? 'Create' : 'Save'), ['class' => $model->isNewRecord ?
        'btn btn-primary' : 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>
