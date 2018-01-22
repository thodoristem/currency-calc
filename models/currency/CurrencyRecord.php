<?php

namespace app\models\currency;

use Yii;

/**
 * This is the model class for table "currency".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 */
class CurrencyRecord extends \yii\db\ActiveRecord
{
    /**
     * The table name
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * Validation rules
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'required'],
            [['name'], 'string', 'max' => 64],
            [['code'], 'string', 'max' => 3],
            [['name', 'code'], 'unique'],
            ['name', 'filter', 'filter' => function ($value) {
          		return strip_tags($value);
      		}],
          	['code', 'filter', 'filter' => function ($value) {
          		return strtoupper(strip_tags($value));
      		}],
        ];
    }

    /**
     * Attributes Labels used with the ActiveForm widget
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Currency Name'),
            'code' => Yii::t('app', 'Currency Code'),
        ];
    }

    /**
     * Returns an array of currencies
     *
     * @param null $index Currency ID for selecting an individual currency
     * @param string $show Select to show full name of the currency or the code name only.
     * @return array|mixed
     */
    public static function getCurrencyList($index = null, $show = 'full'){
        $currencies = self::find()->asArray(true)->all();
        $items = [];
        foreach($currencies as $currency){
            if ($show == 'full'){
                $items[$currency['id']] = $currency['code'] . ' - ' . $currency['name'];
            } else if ($show == 'code') {
                $items[$currency['id']] = $currency['code'];
            }
        }
        return $index ? $items[$index] : $items;
    }
}
