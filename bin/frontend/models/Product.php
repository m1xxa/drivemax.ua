<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $product_number
 * @property string $product_name
 * @property string $product_description
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'product_name'], 'required'],
            [['product_id'], 'integer'],
            [['product_number', 'product_description'], 'string', 'max' => 255],
            [['product_name'], 'string', 'max' => 90],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'product_number' => 'Product Number',
            'product_name' => 'Product Name',
            'product_description' => 'Product Description',
        ];
    }
}
