<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;

?>
<h1>catalog/viewCategory</h1>

<div class=""><?=$category->name?></div>

<div class="container">
    <div class="row">
        <?foreach($model as $item):?>
            <div class="col-lg-3">

                <div class="category-image">
                    <?
                    if($item->photo != null){
                        echo Html::a(Html::img('@web/images/' . $item->photo, ['width' => 90 ]),
                            Url::to($category->alias . '/' . $item->alias));
                    }

                    else {
                        echo Html::a(Html::img('@web/images/not_found.jpg', ['width' => 90 ]),
                            Url::to($category->alias . '/' . $item->alias));
                    }

                    ?>
                </div>

                <div class="category-name">
                    <?=Html::a($item->name, Url::to($category->alias . '/' . $item->alias)) ;?>
                </div>



            </div>
        <?endforeach;?>
    </div>
</div>