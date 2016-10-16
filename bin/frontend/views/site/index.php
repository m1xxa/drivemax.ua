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
                            echo Html::img('@web/images/' . $category->photo, ['width' => 90 ]);
                        }

                        else {
                            echo Html::img('@web/images/not_found.jpg', ['width' => 90 ]);
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
