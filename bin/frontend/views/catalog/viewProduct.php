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
<?foreach ($model as $item):?>

    <div class="row">
        <div class="col-lg-1"><?=$item->photo->photo_name;?></div>
        <div class="col-lg-4"><?=$item->product_name;?></div>
        <div class="col-lg-2"><?=$item->qty;?></div>
        <div class="col-lg-1"><?=$item->warehouse;?></div>
        <div class="col-lg-1"><?=$item->price_id;?></div>
    </div>

<?endforeach;?>
</div>