<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'Запчасти для '. $category->name . ' ' . $subcategory->name . '. "ДрайвМакс" - интернет магазин запчастей для иномарок.';
?>
<?echo Breadcrumbs::widget([
    'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
    'itemTemplate' => "<li>{link}</li>\n",
    'links' => [
        ['label' => $category->name, 'url' => ['catalog/' . $category->alias]],
        ['label' => $subcategory->name],
    ],
]);?>

<div class="catalog-caption">
    Выберите интересующую запчасть для просмотра цены и наличия.
</div>

<div class="container">
    <?foreach($model as $item):?>
        <div class="row product-table-row">

            <div class="col-lg-1 product-row-images">
                <?=Html::a(Html::img('@web/images/camera.png', ['width' => 30]),
                    Url::to('#'))?>
            </div>

            <div class="col-lg-5">
                <div class="product-row-name">
                    <?=Html::a($item->name, Url::to($subcategory->alias . '/' . $item->alias))?>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="product-row-button">
                    <?
                    echo Html::a("Узнать наличие и цену", Url::to($subcategory->alias . '/' . $item->alias),
                        ['class' => 'btn btn-success']);
                    ?>
                </div>

            </div>

        </div>
    <?endforeach;?>
</div>



