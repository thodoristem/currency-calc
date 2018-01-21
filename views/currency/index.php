<?php

/** 
 * @var $this yii\web\View 
 * @var $model app\models\currency\CurrencyRecord
 * @var $dataProvider yii\data\ActiveDataProvider
 */
use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = Yii::t('app', 'Currency Records');
?>
<div class="panel panel-default currency-record-index">
    <div class="panel-heading">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="panel-body">
        <?= $this->render('_form', ['model' => $model]) ?>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item'],
            'itemView' => function ($model, $key, $index, $widget) {
                return $this->render('_list-item', ['model' => $model]);
            },
        ]) ?>
    </div>
</div>
