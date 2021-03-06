<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Product */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'product_id',
            'product_number',
            'product_name',
            'product_description',
            'brand',
            'alias',
            'active:boolean',
            [
                'attribute' => 'warehouse',
                'value' => ArrayHelper::getValue($model, 'productWarehouse.warehouse_name'),
            ],
            'qty',
            [
                'label' => 'Категория',
                'attribute' => 'category_id',
                'value' => ArrayHelper::getValue($model, 'category.name'),

            ],
        ],
    ]) ?>

</div>
