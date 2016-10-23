<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "price".
 *
 * @property integer $id
 * @property integer $price_id
 * @property integer $price_value
 * @property integer $price_currency
 */
class Price extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'price';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price_id', 'price_value', 'price_currency'], 'required'],
            [['price_id', 'price_value', 'price_currency'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price_id' => 'Price ID',
            'price_value' => 'Price Value',
            'price_currency' => 'Price Currency',
        ];
    }
}
