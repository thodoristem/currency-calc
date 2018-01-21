<?php

/**
 * This the calculator main view
 *
 * @var $this yii\web\View
 * @var $conversionForm \app\models\ConversionForm
 */

$this->title = Yii::$app->params['title'];
?>
<div class="panel panel-default">
    <div class="panel-heading"><h2><?= $this->title ?></h2></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-5">
                <!-- Form Block -->
                <?= $this->render('_conversionForm', ['model' => $conversionForm]) ?>
            </div>
            <div class="col-md-7">
                <!-- Result Block -->
                <div id="conversionResult">
                    <div class="currency"><?= $conversionForm->result['currency'] ?></div>
                    <div class="amount"><?= Yii::$app->formatter->asDecimal($conversionForm->result['amount'], 2) ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <p style="text-align: center;">If you prefer to add more currencies or change the conversion ratio of the existing ones navigate to the Settings Dropdown located at the top right corner of this web application.</p>
    </div>
</div>

