<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;

?>
<h1>catalog/index</h1>

<h3> This is are: <?=$categoryid->name;?> category.</h3>

<div class="container">
    <div class="row">
        <?foreach($model as $category):?>
            <div class="col-lg-3">

                <div class="category-image">
                    <?
                    if($category->photo != null){
                        echo Html::a(Html::img('@web/images/' . $category->photo, ['width' => 90 ]),
                            Url::to('catalog/' . $category->alias));
                    }

                    else {
                        echo Html::a(Html::img('@web/images/not_found.jpg', ['width' => 90 ]),
                            Url::to($category->alias));
                    }

                    ?>
                </div>

                <div class="category-name">
                    <?=Html::a($category->name, Url::to($category->alias)) ;?>
                </div>



            </div>
        <?endforeach;?>
    </div>
</div>


<div class="products"><h3> This is products of: <?=$categoryid->name;?> category:</h3></div>

<div class="container">
    <div class="row">
        <?foreach($products as $product):?>
            <div class="col-lg-3">
                <div class="product-image">
                    <?
                    if($product->photo != null){
                        echo Html::a(Html::img('@web/images/' . $product->photo->photo_name, ['width' => 90 ]),
                            Url::to('#'));
                    }
                    else {
                        echo Html::a(Html::img('@web/images/not_found.jpg', ['width' => 90 ]),
                            Url::to('#'));
                    }
                    ?>
                </div>
                <div class="product-name">
                    <?=Html::a($product->product_name, Url::to('@web/product/' . $product->product_id)) ;?>
                </div>
            </div>
        <?endforeach;?>
    </div>
</div>
