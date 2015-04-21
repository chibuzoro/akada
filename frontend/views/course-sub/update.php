<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\CourseSubCategory $model
 */

$this->title = 'Course Sub Category Update ' . $model->id . '';
$this->params['breadcrumbs'][] = ['label' => 'Course Sub Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="course-sub-category-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> View', ['view', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
