<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

/* @var $category \frontend\controllers\CatalogController*/
/* @var $subcategory \frontend\controllers\CatalogController*/
/* @var $product \frontend\controllers\CatalogController*/
?>
<?echo Breadcrumbs::widget([
    'homeLink' => ['label' => 'Главная'],
    'itemTemplate' => "<li>{link}</li>\n",
    'links' => [
        ['label' => $category->name, 'url' => ['catalog/' . $category->alias]],
        ['label' => $subcategory->name, 'url' => ['catalog/' . $category->alias . '/' . $subcategory->alias]],
        ['label' => $product->name],
    ],
]);?>


<?=$category->name?>
<?=$subcategory->name?>
<?=$product->name?>


<div class="container">
        <div class="row">
            <div class="col-lg-1">Фото</div>
            <div class="col-lg-2">Наименование</div>
            <div class="col-lg-2">Код запчасти</div>
            <div class="col-lg-1">Колличество</div>
            <div class="col-lg-1">Цена</div>
            <div class="col-lg-2">Склад</div>
        </div>
</div>

<div class="container">
<?foreach ($model as $item):?>
    <div class="row">
        <div class="col-lg-1"><?=$item->photo->photo_name;?></div>
        <div class="col-lg-2">
            <div class="name"><?=$item->product_name;?></div>
            <div class="info"><?=Html::a('Подробнее', Url::to(''), ['class' => 'btn btn-info'])?></div>

        </div>
        <div class="col-lg-2"><?=$item->product_number;?></div>
        <div class="col-lg-1"><?=$item->qty;?></div>
        <div class="col-lg-1"><?=$item->price_value;?> <?=$item->currency->currency_caption;?></div>
        <div class="col-lg-2"><?=$item->productWarehouse->warehouse_name;?></div>
        <div class="col-lg-1"><?=Html::a('Заказать', Url::to(''), ['class' => 'btn btn-success'])?></div>
    </div>
<?endforeach;?>
</div>
