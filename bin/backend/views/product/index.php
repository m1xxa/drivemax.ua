<?php

use frontend\models\Category;
use frontend\models\Price;
use frontend\models\Product;
use frontend\models\Warehouse;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'product_id',
            'product_number',
            'product_name',
            'active:boolean',
            [
                'attribute' => 'price_id',
                'value' => 'productPrice.price_value',
            ],
            'qty',
            [
                'attribute' => 'warehouse',
                'filter' => Warehouse::find()->select(['warehouse_name', 'warehouse_id'])->indexBy('warehouse_id')->column(),
                'value' => 'productWarehouse.warehouse_name',
            ],

            [
                'label' => 'Категория',
                'attribute' => 'category_id',
                'filter' => Category::find()->select(['name', 'category_id'])->indexBy('category_id')->column(),
                'value' => function (Product $product){
                    return ArrayHelper::getValue($product, 'category.name');
                }
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
