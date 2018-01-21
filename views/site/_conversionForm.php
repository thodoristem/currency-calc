<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use app\models\currency\CurrencyRecord;

/**
 * Calculator form
 *
 * @var $this yii\web\View
 * @var $model app\models\ConversionForm
 * @var $form yii\widgets\ActiveForm
 */
?>
<div class="conversion-form">
    <?php $form = ActiveForm::begin([
        'id' => 'conversion-form',
    ]); ?>
    <?= $form->field($model, 'amount')->textInput([
        'placeholder' => $model->getAttributeLabel('amount')
    ])->label(false) ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'fromCurrencyId')->dropdownList(CurrencyRecord::getCurrencyList(), [
                'prompt' => $model->getAttributeLabel('fromCurrencyId')
            ])->label(false) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'toCurrencyId')->dropdownList(CurrencyRecord::getCurrencyList(), [
                'prompt' => $model->getAttributeLabel('toCurrencyId')
            ])->label(false) ?>
        </div>
    </div>
    <div class="form-group text-right">
        <?= Html::submitButton(Yii::t('app', 'Convert'), ['class' => 'btn btn-lg btn-block btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>