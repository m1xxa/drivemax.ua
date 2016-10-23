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
            [['product_id', 'product_name', 'alias', 'active', 'warehouse', 'price_id', 'qty'], 'required'],
            [['product_id', 'active', 'warehouse', 'price_id', 'qty'], 'integer'],
            [['product_number', 'product_description'], 'string', 'max' => 255],
            [['product_name'], 'string', 'max' => 90],
            [['alias'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'ID товара',
            'product_number' => 'Номер товара',
            'product_name' => 'Наименование',
            'product_description' => 'Описание',
            'alias' => 'Алиас',
            'active' => 'Доступность',
            'warehouse' => 'Склад',
            'price_id' => 'Цена',
            'qty' => 'Количество',

        ];
    }

    public function getProductPhoto() {
        return $this->hasMany(ProductPhoto::className(), ['product_id' => 'product_id']);
    }

    public function getPhoto() {
        return $this->hasOne(Photos::className(), ['photo_id' => 'photo_id'])->via('productPhoto');
    }

    public function getProductCategory() {
        return $this->hasMany(ProductCategory::className(), ['product_id' => 'product_id']);
    }

    public function getCategory() {
        return $this->hasOne(Category::className(), ['category_id' => 'category_id'])->via('productCategory');
    }

    public function getProductWarehouse() {
        return $this->hasOne(Warehouse::className(), ['warehouse_id' => 'warehouse']);
    }

    public function getProductPrice() {
        return $this->hasOne(Price::className(), ['price_id' => 'price_id']);
    }



}
