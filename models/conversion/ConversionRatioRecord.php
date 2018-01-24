<?php

namespace app\models\conversion;

use Yii;
use app\models\currency\CurrencyRecord;

/**
 * This is the model class for table "conversion_ratio".
 *
 * @property int $id
 * @property int $from
 * @property int $to
 * @property double $ratio
 *
 * @property CurrencyRecord $currencyFrom
 * @property CurrencyRecord $currencyTo
 */
class ConversionRatioRecord extends \yii\db\ActiveRecord
{
    /**
     * The table name
     */
    public static function tableName()
    {
        return 'conversion_ratio';
    }

    /**
     * Validation Rules
     */
    public function rules()
    {
        return [
            [['from', 'to'], 'required'],
            [['from', 'to'], 'integer'],
            [['ratio'], 'number'],
            [['from'], 'exist', 'skipOnError' => true, 'targetClass' => CurrencyRecord::className(), 'targetAttribute' => ['from' => 'id']],
            [['to'], 'exist', 'skipOnError' => true, 'targetClass' => CurrencyRecord::className(), 'targetAttribute' => ['to' => 'id']],
            [['from', 'to'], function ($attribute, $params, $validator) {
                $exists = self::find()->where([
                    'from' => $this->from,
                    'to' => $this->to
                ])->orWhere([
                    'from' => $this->to,
                    'to' => $this->from
                ])->exists();
                if ($exists && !$this->id){
                    $this->addError($attribute, Yii::t('app', 'This conversion combination already exists'));
                }
            }]
        ];
    }

    /**
     * Attributes Labels used with the ActiveForm widget
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'from' => Yii::t('app', 'From currency'),
            'to' => Yii::t('app', 'To currency'),
            'ratio' => Yii::t('app', 'Ratio'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrencyFrom()
    {
        return $this->hasOne(CurrencyRecord::className(), ['id' => 'from']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrencyTo()
    {
        return $this->hasOne(CurrencyRecord::className(), ['id' => 'to']);
    }
}
