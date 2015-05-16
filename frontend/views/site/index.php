<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Akada';

?>



<div class="home-top flxac">
    <div class="home-top-splash">

        <h1 class="heading light">Learn the right skills for your next Job.</h1>
        <?= Html::beginForm(['course/index'], 'post', ['class' => 'form mt20 pos-r flxac']) ?>
        <div class="search-input-container fx">
            <?= Html::textInput('search-course', null, [
                'placeholder' => 'what would you like to learn today?',
                'type' => 'search',
                'class' => 'search-field form-control quick-search ui-autocomplete-input'
            ]) ?>
            </div>
        <?= Html::submitButton("<i class='fa fa-search'></i>", ['class' => 'home-search-btn']) ?>


        <?= Html::endForm() ?>

        <div class="search-tips">
            Search for online professional courses on ICAN, OrcaFlex, CFA, or anything else.
        </div>
        <ul class="fxjc features">
            <li class="flxac">
                <i class="fa fa-group"></i>
                <span>Growing number of students.</span>
            </li>
            <li class="flxac">
                <i class="fa fa-rocket"></i>
                <span>Unique courses found nowhere else!</span>
            </li>
            <li class="flxac">
                <i class="fa fa-mobile"></i>
                <span>Learn from anywhere,with any device at your convenience.</span>
            </li>
        </ul>
    </div>

</div>




