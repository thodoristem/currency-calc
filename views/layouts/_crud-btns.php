<?php 

use yii\bootstrap\ButtonGroup;
use yii\helpers\Html;
use app\models\currency\CurrencyRecord;
use app\models\conversion\ConversionRatioRecord;

/**
 * @var $model CurrencyRecord|ConversionRatioRecord
 */
?>

<div class="crud-btns">
    <?= ButtonGroup::widget([
        'encodeLabels' => false,
        'options' => [
            'class' => 'btn-group-justified'
        ],
        'buttons' => [
            Html::a('<span class="glyphicon glyphicon-edit"></span>', [
                'index', 'edit' => $model->id
            ], [
                'class' => 'btn btn-primary'
            ]),
            Html::a('<span class="glyphicon glyphicon-trash"></span>', [
                'delete', 'id' => $model->id
            ], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure?',
                    'method' => 'post',
                ],
            ]),
        ],
    ])?>
</div>