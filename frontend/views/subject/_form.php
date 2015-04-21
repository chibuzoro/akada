<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
* @var yii\web\View $this
* @var common\models\Subject $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="subject-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>
        <?php $this->beginBlock('main'); ?>

        <p>
            
			<?= $form->field($model, 'id')->textInput() ?>
			<?= $form->field($model, 'course_id')->textInput() ?>
			<?= $form->field($model, 'subject_title')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'price')->textInput() ?>
			<?= $form->field($model, 'curriculum_id')->textInput() ?>
			<?= $form->field($model, 'content_type')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'content_location')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'content_length')->textInput() ?>
			<?= $form->field($model, 'date_uploaded')->textInput() ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    \yii\bootstrap\Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Subject',
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
