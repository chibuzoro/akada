<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body id="akada" class="akada pageload">
<?php $this->beginBody() ?>

<?php
NavBar::begin([
    'brandLabel' => Html::img('@web/images/akada.png'),
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'header-top nobg',
    ],
]);
$menuItems = [
    ['label' => 'Become a Mentor', 'url' => ['/site/index'], 'options' => ['class' => 'white-link']],
];
if (Yii::$app->user->isGuest) {
    array_push($menuItems, ['label' => 'Login', 'url' => ['/site/login'], 'options' => ['class' => 'white-link']],
        ['label' => 'Signup', 'url' => ['/site/login'], 'options' => ['class' => 'white-link']]);
} else {
    $menuItems[] = [
        'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
        'url' => ['/site/logout'],
        'linkOptions' => ['data-method' => 'post']
    ];
}
echo Nav::widget([
    'options' => ['class' => 'navbar-right fx fxac fxje'],
    'items' => $menuItems,
]);
NavBar::end();
?>

<div class="">

    <?= $content ?>



    <div class="home-main"><h2>Discover top-notch courses</h2>

        <div class="stickyfooter">
            <footer class="footer fs13 p15-0">
                <div class="container">


                    <ul class="fxw fxwrap fs11-xs">


                        <li>
                            <a href="https://about.akada.com" class="white-text">About Us</a>
                        </li>

                        <!-- todo : unhide business link  once business module is setup -->

                        <li>
                            <a href="https://business.akada.com?ref=footer" class="white-text hidden">Akada for
                                Business</a>
                        </li>


                        <li>
                            <a href="https://teach.akada.com?ref=teach_footer" class="white-text">Be a Mentor</a>
                        </li>


                        <li>
                            <a href="https://blog.akada.com" class="white-text">Blog</a>
                        </li>


                        <li>
                            <a href="/topics/" class="white-text">Topics</a>
                        </li>

                        <!-- todo : unhide mobile link  once mobile app is setup -->

                        <li>
                            <a href="/mobile/" class="white-text hidden">Mobile Apps</a>
                        </li>


                        <li>
                            <a href="/support/" class="white-text">Support</a>
                        </li>


                        <li>
                            <a href="/careers" class="white-text">Careers</a>
                        </li>


                    </ul>

                    <ul class="fxw mt10 hidden-xs">


                        <li>
                        <span class="grey-text copyright">
                            Copyright © <?= date('Y') ?> akada.com
                        </span>
                        </li>

                        <li>
                            <a href="/terms/" rel="nofollow" class="grey-text">
                                Terms of Use
                            </a>
                        </li>
                        <li>
                            <a href="/terms/privacy" rel="nofollow" class="grey-text">
                                Privacy Policy
                            </a>
                        </li>
                    </ul>

                </div>
            </footer>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
