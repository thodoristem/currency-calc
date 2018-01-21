<?php 

/**
 * @var $this yii\web\View
 * @var $model app\model\currency\CurrencyRecord
 */
?>
<div class="row">
    <div class="col-md-10">
        <div class="currencyCode"><?= $model->code ?></div>
        <div class="currencyName"><?= $model->name ?></div>
    </div>
    <div class="col-md-2">
        <?= $this->render('../layouts/_crud-btns', ['model' => $model]) ?>
    </div>
</div>
