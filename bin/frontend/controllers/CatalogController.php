<?php

namespace frontend\controllers;

use frontend\models\Category;
use frontend\models\Product;
use yii\web\Controller;


class CatalogController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($category){
        $categoryId = Category::find()->where(['alias' => $category])->one();
        $model = Category::find()->where(['parent_id' => $categoryId->category_id])->all();
        $products = Product::find()->joinWith(['category'])->where(['alias' => $categoryId->alias])->all();
        return $this->render('index', ['model' => $model, 'products' => $products, 'categoryid' => $categoryId]);
    }

}
