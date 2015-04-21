<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
* @var yii\web\View $this
* @var common\models\User $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>
        <?php $this->beginBlock('main'); ?>

        <p>
            
			<?= $form->field($model, 'id')->textInput() ?>
			<?= $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'password')->passwordInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'password_hash')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'auth_key')->textInput() ?>
			<?= $form->field($model, 'updated_at')->textInput() ?>
			<?= $form->field($model, 'created_at')->textInput() ?>
			<?= $form->field($model, 'lastlogin_at')->textInput() ?>
			<?= $form->field($model, 'status')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    \yii\bootstrap\Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'User',
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
