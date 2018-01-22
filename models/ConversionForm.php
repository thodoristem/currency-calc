<?php
namespace app\models;

use Yii;
use app\models\conversion\ConversionRatioRecord;
use app\models\currency\CurrencyRecord;

/**
 * This is the main form model for the currency calculator.
 */
class ConversionForm extends \yii\base\Model{

    /**
     * The amount that will be converted
     * @var double
     */
    public $amount;

    /**
     * The currency from witch to convert
     * @var integer
     */
    public $fromCurrencyId;

    /**
     * The currency to convert to
     * @var integer
     */
    public $toCurrencyId;

    /**
     * The result of the conversion. An array at this case for multiple data transfer at once!
     * @var array
     */
    public $result = [];

    /**
    * Called when the model initiates
    */
    public function init() {
        $this->result = [
            'amount' => 0.00,
            'currency' => '---'
        ];
    }

    /**
    * Validation rules
    */
    public function rules()
    {
        return [
            [['amount', 'fromCurrencyId', 'toCurrencyId'], 'required'],
            ['amount', 'number'],
            [['fromCurrencyId', 'toCurrencyId'], 'integer'],
            ['toCurrencyId', 'compare', 'compareAttribute' => 'fromCurrencyId', 'operator' => '!==']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'amount' => Yii::t('app', 'Amount'),
            'fromCurrencyId' => Yii::t('app', 'Convert from'),
            'toCurrencyId' => Yii::t('app', 'Convert to'),
        ];
    }

    /**
     * Here is where the conversion takes place.
     */
    public function convert() {
        $ratio = 0;
        if ($this->validate()){
            if ($conversionRatio = ConversionRatioRecord::find()->where([
                'from' => $this->fromCurrencyId,
                'to' => $this->toCurrencyId
            ])->asArray(true)->one()){ // if this conversion combination exists use the ratio saved in database
                $ratio = $conversionRatio['ratio'];
            } else if ($conversionRatio = ConversionRatioRecord::find()->where([
                'from' => $this->toCurrencyId,
                'to' => $this->fromCurrencyId
            ])->asArray(true)->one()) { // if the reverse conversion combination exists use the the 1 / ratio
                $ratio = 1 / $conversionRatio['ratio'];
            } else {
                return false;
            }
            return $this->result = [
                'amount' => $this->amount * $ratio, // Make the conversion and return the value
                'currency' => CurrencyRecord::getCurrencyList($this->toCurrencyId) // Return the currency name the value converted to
            ];
        }
    }
}
