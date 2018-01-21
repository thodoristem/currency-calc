<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\currency\CurrencyRecord */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="currency-record-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-5">
            <?= $form->field($model, 'name')->textInput([
                'maxlength' => true,
                'placeholder' => $model->getAttributeLabel('name')
            ])->label(false) ?>
        </div>
        <div class="col-md-5">
            <?= $form->field($model, 'code')->textInput([
                'maxlength' => true,
                'placeholder' => $model->getAttributeLabel('code')
            ])->label(false) ?>
        </div>
        <div class="col-md-2">
            <?= Html::submitButton('<span class="glyphicon glyphicon-floppy-disk"></span> ' . Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-block']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
