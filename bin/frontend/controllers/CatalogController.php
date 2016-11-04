<?php

namespace frontend\controllers;

use frontend\models\Cart;
use frontend\models\Category;
use frontend\models\OrderProducts;
use frontend\models\Orders;
use frontend\models\Product;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;


class CatalogController extends Controller
{

    const SESSION_KEY = 'order_id';

    public function actionViewCategory($category){
        $currentCategory = Category::find()->where(['alias' => $category])->one();
        $model = Category::find()->where(['parent_id' => $currentCategory->category_id])->all();

        return $this->render('viewCategory', ['category' => $currentCategory, 'model' => $model]);
    }

    public function actionViewSubcategory($category, $subcategory){
        $currentCategory = Category::find()->where(['alias' => $category])->one();
        $currentSubcategory = Category::find()->where(['alias' => $subcategory])->one();
        $model = Category::find()->where(['parent_id' => $currentSubcategory->category_id])->all();

        return $this->render('viewSubcategory', ['category' => $currentCategory, 'subcategory' => $currentSubcategory,
            'model' => $model]);
    }

    public function actionViewProduct($category, $subcategory, $product){
        $currentCategory = Category::find()->where(['alias' => $category])->one();
        $currentSubcategory = Category::find()->where(['alias' => $subcategory])->one();
        $currentProduct = Category::find()->where(['alias' => $product])->one();
        $model = Product::find()->joinWith(['category', 'photo', 'productWarehouse'])->
            where(['category.category_id' => $currentProduct->category_id])->all();

        return $this->render('viewProduct', ['category' => $currentCategory, 'subcategory' => $currentSubcategory,
            'product' => $currentProduct, 'model' => $model]);
    }

    public function actionCart() {
        $query = OrderProducts::find()->where(['order_id' => Yii::$app->session->get(self::SESSION_KEY)]);
        $dataProvider = new ActiveDataProvider(['query' => $query]);

        return $this->render('viewCart', ['dataProvider' => $dataProvider, 'query' => $query]);
    }

    public function actionAddToCart($product_id) {
        if(!Yii::$app->session->has(self::SESSION_KEY)){
            $order = new Orders();
            $order->status = 0;
            $order->save();
            Yii::$app->session->set(self::SESSION_KEY, $order->id);
        }

        $product = Product::find()->where(['product_id' => $product_id])->one();

        $orderProducts = new OrderProducts();
        $orderProducts->order_id = Yii::$app->session->get(self::SESSION_KEY);
        $orderProducts->product_id = $product->product_id;
        $orderProducts->product_number = $product->product_number;
        $orderProducts->price = $product->price_value;
        $orderProducts->product_name = $product->product_name;
        $orderProducts->warehouse_id = $product->warehouse;
        $orderProducts->count = 1;
        $orderProducts->photo = $product->photo->photo_name;
        $orderProducts->save();

        return $this->redirect('@web/cart');
    }

    public function actionCartClear(){

        Yii::$app->session->remove(self::SESSION_KEY);

        return $this->redirect('@web/cart');

    }
}
