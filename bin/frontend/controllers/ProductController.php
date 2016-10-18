<?php

namespace frontend\controllers;

use frontend\models\Product;
use yii\web\Controller;

class ProductController extends Controller
{
    public function actionView($id)
    {
        $item = Product::find()->where(['product_id' => $id])->one();
        return $this->render('index', ['id_product' => $id, 'item' => $item]);
    }

}
