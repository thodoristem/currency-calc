<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->params['title'],
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top'
        ]
    ]);
    echo Nav::widget([
        'items' => [
            [
                'label' => '<span class="glyphicon glyphicon-cog"></span> '.Yii::t('app', 'Settings'), 'items' => [
                    ['label' => '<span class="glyphicon glyphicon-usd"></span> ' . Yii::t('app', 'Currency'), 'url' => ['/currency']],
                    ['label' => '<span class="glyphicon glyphicon-stats"></span> ' . Yii::t('app', 'Conversion Ratio'), 'url' => ['/conversion-ratio']],
                ]
            ]
        ],
        'options' => [
            'class' => 'navbar-nav navbar-right'
        ],
        'encodeLabels' => false
    ]);
    NavBar::end();
    ?>
</header>
<div class="container mainWrapper">
    <?= Alert::widget() ?>
    <?= $content ?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
