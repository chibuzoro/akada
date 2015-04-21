<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Curriculum $model
 */

$this->title = 'Curriculum Update ' . $model->id . '';
$this->params['breadcrumbs'][] = ['label' => 'Curriculums', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="curriculum-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> View', ['view', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
