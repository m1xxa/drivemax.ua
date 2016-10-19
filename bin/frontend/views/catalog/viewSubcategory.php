<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;

?>
<h1>catalog/viewSubcategory</h1>

<div class=""><?=$category->alias?> /  <?=$subcategory->alias?></div>


<div class="container">
    <?foreach($model as $item):?>
        <div class="row">
            <div class="col-lg-1">
                <div class="product-row-image">
                    <?
                    //переделать логику, если в товарах есть хоть одна картинка, то выводить кнопку, если нет, то не выводить
                    echo Html::a(Html::img('@web/images/not_found.jpg', ['width' => 50]),
                        Url::to('#'));
                    ?>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="product-row-name">
                    <?=Html::a($item->name, Url::to($subcategory->alias . '/' . $item->name))?>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="product-row-button">
                    <?
                    echo Html::button('Посмотреть');
                    ?>
                </div>

            </div>

        </div>
    <?endforeach;?>
</div>



