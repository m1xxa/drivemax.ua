<?php
/* @var $this yii\web\View */
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;

/* @var $category \frontend\controllers\CatalogController*/
/* @var $subcategory \frontend\controllers\CatalogController*/
/* @var $product \frontend\controllers\CatalogController*/

$this->title = $product->name
    . ' купить с доставкой по Украине. "ДрайвМакс" - интернет-магазин автозапчастей для иномарок.';


?>
<?echo Breadcrumbs::widget([
    'homeLink' => ['label' => 'Главная', 'url' => Yii::$app->homeUrl],
    'itemTemplate' => "<li>{link}</li>\n",
    'links' => [
        ['label' => $category->name, 'url' => ['catalog/' . $category->alias]],
        ['label' => $subcategory->name, 'url' => ['catalog/' . $category->alias . '/' . $subcategory->alias]],
        ['label' => $product->name],
    ],
]);?>
<div class="product-table">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2"><b>Фото</b></div>
            <div class="col-lg-4"><b>Наименование</b></div>
            <div class="col-lg-1"><b>Бренд</b></div>
            <div class="col-lg-1"><b>Цена</b></div>
            <div class="col-lg-2"><b>Склад</b></div>
        </div>
    </div>
    <div class="product-table-separate"></div>
    <div class="container-fluid product-table">
        <?foreach ($model as $item):?>
            <div class="row product-table-row">
                <div class="col-lg-2">
                    <?
                    $image = '@web/images/not_found.jpg';
                    if (!$item->photo->photo_name == null) {
                        $image = '@web/images/catalog/products/' . $item->photo->photo_name;
                    }

                    Modal::begin([
                        'header' => 'Фотографии товаров',
                        'toggleButton' => [
                            'label' => Html::img($image,
                                    ['width' => 100]),
                            'class' => 'btn-photo'
                        ],
                        'footer' => ''
                    ]);

                    echo Html::img('@web/images/catalog/products/' . $item->photo->photo_name);


                    Modal::end();


                    Html::a(Html::img('@web/images/catalog/products/' . $item->photo->photo_name, ['width' => 120]),
                        Url::to('#myModal'), ['data-toggle' => 'modal']);?></div>
                <div class="col-lg-4">
                    <div class="number">Номер: <?=$item->product_number;?></div>
                    <div class="name"><?=$item->product_name;?></div>
                    <div class="info">
                        <?Modal::begin([
                        'header' => $item->product_name,
                        'toggleButton' => [
                        'label' => 'Подробнее',
                        'class' => 'btn btn-info'
                        ],
                        'footer' => ''
                        ]);?>

                        <div><b>Каталожный номер:</b>  <?=$item->product_number;?></div>
                        <div><b>Полное описание:</b>  <?=$item->product_description;?></div>
                        <div><b>Бренд:</b>  <?=$item->brand;?></div>
                        <div><b>Цена:</b>  <?=(int)($item->price_value * $item->currency->currency_value)?> грн.</div>
                        <div><b>Фото:</b>  <?=Html::img(
                                '@web/images/catalog/products/' . $item->photo->photo_name, ['width' => 500])?></div>



                        <?Modal::end();?>

                    </div>
                </div>
                <div class="col-lg-1 ">
                    <?=$item->brand;?>
                </div>
                <div class="col-lg-1 price-cell">
                    <?=(int)($item->price_value * $item->currency->currency_value)?> грн
                </div>
                <div class="col-lg-2">
                    <div class="qty">Доступно: <?=$item->qty?> шт</div>
                    <div class="delivery">Отправка в течении <?=$item->productWarehouse->warehouse_wait_days;?> дней</div>
                </div>
                <div class="col-lg-1">

                    <?php Pjax::begin(['enablePushState' => false, 'options' => ['class' => 'add-button-pjax']]); ?>

                    <?php

                    if(array_key_exists($item->product_id, $cart)):?>

                        <?=Html::a('В корзине ' . $cart[$item->product_id]['count'] . ' шт',
                            Url::to('@web/cart'), ['class' => 'btn btn-danger', 'data-pjax' => 0])?>
                    <?php else:?>
                        <?=Html::a('Заказать', Url::to('/catalog/' . $category->alias . '/' . $subcategory->alias) . '/'
                            . $product->alias . '/add/'. $item->product_id, ['class' => 'btn btn-success add-button'])?>

                    <?php endif?>

                    <?php Pjax::end(); ?>

                </div>
            </div>


            <div id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Заголовок модального окна -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title"><?=$item->product_name;?></h4>
                        </div>
                        <!-- Основное содержимое модального окна -->
                        <div class="modal-body">
                            <div class="modal-description">
                                <b>Описание:</b> <?=$item->product_description?>
                            </div>

                            <div class="modal-price">
                                <b>Цена:</b> <?=(int)($item->price_value * $item->currency->currency_value)?> грн.
                            </div>


                            <div class="modal-image">
                                <b>Фото:</b><br><?=Html::img('@web/images/catalog/products/' . $item->photo->photo_name);?>
                            </div>

                        </div>
                        <!-- Футер модального окна -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
        <?endforeach;?>
    </div>





</div>


