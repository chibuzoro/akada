<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var common\models\CourseSearch $searchModel
*/

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="course-index">

    <?php //     echo $this->render('_search', ['model' =>$searchModel]);
    ?>

    <div class="clearfix">
        <p class="pull-left">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New Course', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <div class="pull-right">


                                                                                                                                                                    
            <?php 
            echo \yii\bootstrap\ButtonDropdown::widget(
                [
                    'id'       => 'giiant-relations',
                    'encodeLabel' => false,
                    'label'    => '<span class="glyphicon glyphicon-paperclip"></span> Relations',
                    'dropdown' => [
                        'options'      => [
                            'class' => 'dropdown-menu-right'
                        ],
                        'encodeLabels' => false,
                        'items'        => [
    [
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Curriculum</i>',
        'url' => [
            'curriculum/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Subject</i>',
        'url' => [
            'subject/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Student Course</i>',
        'url' => [
            'student-course/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-left"> Profile</i>',
        'url' => [
            'profile/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-left"> Course Sub Category</i>',
        'url' => [
            'course-sub-category/index',
        ],
    ],
]                    ],
                ]
            );
            ?>        </div>
    </div>

            <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
        
			'id',
			'course_title',
			'sub_category_id',
			'create_date',
			'update_date',
			'course_summary',
			'price',
			/*'created_by'*/
			/*'is_publish'*/
			/*'course_objectives'*/
			/*'course_preview'*/
            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function($action, $model, $key, $index) {
                    // using the column name as key, not mapping to 'id' like the standard generator
                    $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                    $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                    return \yii\helpers\Url::toRoute($params);
                },
                'contentOptions' => ['nowrap'=>'nowrap']
            ],
        ],
    ]); ?>
    
</div>
