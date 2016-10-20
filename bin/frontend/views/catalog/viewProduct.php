<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;

?>
    <h1>catalog/viewProduct</h1>

<?=$category->name?>
<?=$subcategory->name?>
<?=$product->name?>

<?foreach ($model as $item):?>

    <div class=""><?=$item->product_name;?></div>

<?endforeach;?>
