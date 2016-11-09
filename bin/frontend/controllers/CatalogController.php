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
        $currentCategory = Category::getCategoryByAlias($category);
        $model = Category::getCategoryByParentId($currentCategory->category_id);
        return $this->render('viewCategory', ['category' => $currentCategory, 'model' => $model]);
    }

    public function actionViewSubcategory($category, $subcategory){
        $currentCategory = Category::getCategoryByAlias($category);
        $currentSubcategory = Category::getCategoryByAlias($subcategory);
        $model = Category::getCategoryByParentId($currentSubcategory->category_id);
        return $this->render('viewSubcategory', ['category' => $currentCategory, 'subcategory' => $currentSubcategory,
            'model' => $model]);
    }

    public function actionViewProduct($category, $subcategory, $product){
        $currentCategory = Category::getCategoryByAlias($category);
        $currentSubcategory = Category::getCategoryByAlias($subcategory);
        $currentProduct = Category::getCategoryByAlias($product);
        $model = Product::findByCategoryId($currentProduct->category_id, ['category', 'photo', 'productWarehouse']);

        return $this->render('viewProduct', ['category' => $currentCategory, 'subcategory' => $currentSubcategory,
            'product' => $currentProduct, 'model' => $model]);
    }

    public function actionCart() {
        $query = OrderProducts::find()->where(['order_id' => Yii::$app->session->get(self::SESSION_KEY)]);
        $dataProvider = new ActiveDataProvider(['query' => $query]);

        $orderProducts = OrderProducts::find()->where(['order_id' => Yii::$app->session->get(self::SESSION_KEY)])->all();

        return $this->render('viewCart', ['orderProducts' => $orderProducts]);
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
        $orderProducts->price = $product->price_value * $product->currency->currency_value;
        $orderProducts->product_name = $product->product_name;
        $orderProducts->brand = $product->brand;
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

    public function actionDeleteFromCart ($id){
        $orderProducts = OrderProducts::find()
                        ->where(['order_id' => Yii::$app->session->get(self::SESSION_KEY), 'product_id' => $id])->one();
        $orderProducts->delete();

        return $this->redirect('@web/cart');

    }

    public function actionOrder() {
        $model = Orders::find()->where(['id' => Yii::$app->session->get(self::SESSION_KEY)])->one();
        $products = OrderProducts::find()->where(['order_id' => Yii::$app->session->get(self::SESSION_KEY)])->all();

        if($model->load(Yii::$app->request->post())){
            $model->status = 1;
            $model->save();
            Yii::$app->session->remove(self::SESSION_KEY);

            return $this->render('viewSuccess', ['model' => $model, 'products' => $products]);
        }

        return $this->render('viewOrder', ['model' => $model]);
    }

    public function actionAddPosition() {

        return $this->render('viewTemp', ['$time' => date('H:i:s')]);

    }



}
