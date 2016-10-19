<?php

namespace frontend\controllers;

use frontend\models\Category;
use frontend\models\Product;
use yii\web\Controller;


class CatalogController extends Controller
{

    public function actionViewCategory($category){

        $currentCategory = Category::find()->where(['alias' => $category])->one();
        $model = Category::find()->where(['parent_id' => $currentCategory->category_id])->all();

        return $this->render('viewCategory', ['category' => $currentCategory, 'model' => $model]);

        //$categoryId = Category::find()->where(['alias' => $category])->one();
        //$model = Category::find()->where(['parent_id' => $categoryId->category_id])->all();
        //$products = Product::find()->joinWith(['category'])->where(['alias' => $categoryId->alias])->all();
        //return $this->render('index', ['model' => $model, 'products' => $products, 'categoryid' => $categoryId]);
    }

    public function actionViewSubcategory($category, $subcategory){
        $currentCategory = Category::find()->where(['alias' => $category])->one();
        $currentSubcategory = Category::find()->where(['alias' => $subcategory])->one();
        $model = Category::find()->where(['parent_id' => $currentSubcategory->category_id])->all();

        return $this->render('viewSubcategory', ['category' => $currentCategory, 'subcategory' => $currentSubcategory,
            'model' => $model]);
    }

    public function actionViewProduct($category, $subcategory, $product){
        return $this->render('viewProduct', ['category' => $category, 'subcategory' => $subcategory,
            'product' => $product]);
    }



}
