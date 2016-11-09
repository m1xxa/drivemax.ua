<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'My Yii Application';

?>
<div class="site-index">

    <div class="container">
        <div class="row">
            <?foreach($model as $category):?>
                <div class="col-lg-3">

                    <div class="category-image">
                        <?
                        if($category->photo != null){
                            echo Html::a(Html::img('@web/images/catalog/category/' . $category->photo, ['width' => 50 ]),
                                Url::to('catalog/' . $category->alias));
                        }

                        else {
                            echo Html::a(Html::img('@web/images/not_found.jpg', ['width' => 90 ]),
                                Url::to('catalog/' . $category->alias));
                        }

                        ?>
                    </div>

                    <div class="category-name">
                        <?=Html::a($category->name, Url::to('catalog/' . $category->alias))  ;?>
                    </div>



                </div>
            <?endforeach;?>
        </div>

    </div>


</div>
