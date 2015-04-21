<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
* @var yii\web\View $this
* @var common\models\Question $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="question-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>
        <?php $this->beginBlock('main'); ?>

        <p>
            
			<?= $form->field($model, 'id')->textInput() ?>
			<?= $form->field($model, 'description')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'answer')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'answer_options')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'question_type_id')->textInput() ?>
			<?= $form->field($model, 'answer_explanation')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'subject_id')->textInput() ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    \yii\bootstrap\Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Question',
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
