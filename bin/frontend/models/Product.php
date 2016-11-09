<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $product_number
 * @property string $product_name
 * @property string $product_description
 * @property string $price_value
 *
 */
class Product extends ActiveRecord
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
            [['product_id', 'product_name', 'alias', 'active', 'warehouse', 'qty', 'price_value', 'price_currency'], 'required'],
            [['product_id', 'active', 'warehouse', 'qty', 'price_currency'], 'integer'],
            [['price_value'], 'double'],
            [['product_number', 'product_description'], 'string', 'max' => 255],
            [['product_name'], 'string', 'max' => 90],
            [['alias', 'brand'], 'string'],
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
            'brand' => 'Бренд'

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

    public function getCurrency() {
        return $this->hasOne(Currency::className(), ['currency_id' => 'price_currency']);
    }

    public static function findByCategoryId($categoryId, $arrayOfTables = array()) {
        return Product::find()->joinWith($arrayOfTables)->
           where(['category.category_id' => $categoryId])->all();
    }


}
