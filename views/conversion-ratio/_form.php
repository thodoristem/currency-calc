<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\currency\CurrencyRecord;

/* @var $this yii\web\View */
/* @var $model app\models\conversion\ConversionRatioRecord */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="conversion-ratio-record-form">
    <?php $form = ActiveForm::begin([

    ]); ?>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'from')->dropDownList(CurrencyRecord::getCurrencyList(), [
                'prompt' => $model->getAttributeLabel('from')
            ])->label(false) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'to')->dropDownList(CurrencyRecord::getCurrencyList(), [
                'prompt' => $model->getAttributeLabel('to')
            ])->label(false) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'ratio')->textInput([
                'maxlength' => true,
                'placeholder' => $model->getAttributeLabel('ratio')
            ])->label(false) ?>
        </div>
        <div class="col-md-2">
            <?= Html::submitButton('<span class="glyphicon glyphicon-floppy-disk"></span> ' . Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-block']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
