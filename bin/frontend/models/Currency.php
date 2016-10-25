<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "currency".
 *
 * @property integer $id
 * @property integer $currency_id
 * @property string $currency_name
 * @property string $currency_picture
 * @property double $currency_value
 */
class Currency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['currency_id', 'currency_name', 'currency_value'], 'required'],
            [['currency_id'], 'integer'],
            [['currency_value'], 'number'],
            [['currency_name', 'currency_picture'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'currency_id' => 'Currency ID',
            'currency_name' => 'Currency Name',
            'currency_picture' => 'Currency Picture',
            'currency_value' => 'Currency Value',
        ];
    }
}
