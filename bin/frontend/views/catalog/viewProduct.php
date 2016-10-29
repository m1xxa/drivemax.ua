<?php
/* @var $this yii\web\View */
/* @var $category \frontend\controllers\CatalogController*/
/* @var $subcategory \frontend\controllers\CatalogController*/
/* @var $product \frontend\controllers\CatalogController*/
?>

    <h1>catalog/viewProduct</h1>

<?=$category->name?>
<?=$subcategory->name?>
<?=$product->name?>


<div class="container">
        <div class="row">
            <div class="col-lg-1">Фото</div>
            <div class="col-lg-2">Наименование</div>
            <div class="col-lg-1">Колличество</div>
            <div class="col-lg-1">Цена</div>
            <div class="col-lg-2">Склад</div>
        </div>
</div>

<div class="container">
<?foreach ($model as $item):?>
    <div class="row">
        <div class="col-lg-1"><?=$item->photo->photo_name;?></div>
        <div class="col-lg-2"><?=$item->product_name;?></div>
        <div class="col-lg-1"><?=$item->qty;?></div>
        <div class="col-lg-1"><?=$item->price_value;?> <?=$item->currency->currency_caption;?></div>
        <div class="col-lg-2"><?=$item->productWarehouse->warehouse_name;?></div>
        <div class="col-lg-2"><button>Подробности</button></div>
        <div class="col-lg-2"><button>Заказать</button></div>
    </div>
<?endforeach;?>
</div>
