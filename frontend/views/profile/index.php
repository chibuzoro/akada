<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var common\models\ProfileSearch $searchModel
*/

$this->title = 'Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="profile-index">

    <?php //     echo $this->render('_search', ['model' =>$searchModel]);
    ?>

    <div class="clearfix">
        <p class="pull-left">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New Profile', ['create'], ['class' => 'btn btn-success']) ?>
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
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Billing</i>',
        'url' => [
            'billing/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Student Course</i>',
        'url' => [
            'student-course/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-left"> Tutor</i>',
        'url' => [
            'tutor/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Course</i>',
        'url' => [
            'course/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-left"> User</i>',
        'url' => [
            'user/index',
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
			'first_name',
			'last_name',
			'email:email',
			'is_tutor',
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
