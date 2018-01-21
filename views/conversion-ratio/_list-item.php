<?php 
/**
 * @var $this yii\web\View
 * @var $model app\model\currency\ConversionRatioRecord
 */
?>
<div class="row">
    <div class="col-md-5 col-xs-6">
        <div class="conversionRatio">
            <?= Yii::$app->formatter->asDecimal($model->ratio, 4) ?>
        </div>
        <div class="currencyFromTo">
            <?= $model->currencyFrom->name ?> -> <?= $model->currencyTo->name ?>
        </div>
    </div>
    <div class="col-md-5 col-xs-6">
        <div class="conversionRatio">
            <?= Yii::$app->formatter->asDecimal(1 / $model->ratio, 4) ?>
        </div>
        <div class="currencyToFrom">
            <?= $model->currencyTo->name ?> -> <?= $model->currencyFrom->name ?>
        </div>
    </div>
    <div class="col-md-2">
        <?= $this->render('../layouts/_crud-btns', ['model' => $model]) ?>
    </div>
</div>