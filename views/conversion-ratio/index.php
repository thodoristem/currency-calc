<?php

/**
 * @var $this yii\web\View 
 * @var $model app\models\conversion\ConversionRatioRecord
 * @var $dataProvider yii\data\ActiveDataProvider
 */
use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = Yii::t('app', 'Conversion Ratio Records');
?>
<div class="panel panel-default conversion-ratio-record-index">
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
