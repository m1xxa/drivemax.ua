<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property integer $id
 * @property integer $product_id
 * @property double $price
 * @property integer $count
 * @property string $product_number
 * @property string $product_name
 * @property integer $warehouse_id
 * @property integer $qty
 * @property string $photo
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'price', 'count', 'product_number', 'product_name', 'warehouse_id', 'qty', 'photo', 'order_id'], 'required'],
            [['product_id', 'count', 'warehouse_id', 'qty', 'order_id'], 'integer'],
            [['price'], 'number'],
            [['product_number', 'product_name', 'photo'], 'string', 'max' => 255],
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
            'price' => 'Price',
            'count' => 'Count',
            'product_number' => 'Product Number',
            'product_name' => 'Product Name',
            'warehouse_id' => 'Warehouse ID',
            'qty' => 'Qty',
            'photo' => 'Photo',
        ];
    }
}
