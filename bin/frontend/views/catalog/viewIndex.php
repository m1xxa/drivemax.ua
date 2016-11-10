<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Автомагазин ДрайвМакс - запчасти для иномарок';

?>
<div class="site-index">

    <div class="alphabet-container">
        <div class="alphabet-caption">
            Фильтр по алфавиту:
        </div>
        <div class="alphabet-buttons">
            <div class="container">
                <div class="row alphabet-buttons">
                    <span class="btn btn-default"><?=Html::a('A', Url::to('@web/catalog/filter/a'))?></span>
                    <span class="btn btn-default"><?=Html::a('B', Url::to('@web/catalog/filter/b'))?></span>
                    <span class="btn btn-default"><?=Html::a('C', Url::to('@web/catalog/filter/c'))?></span>
                    <span class="btn btn-default"><?=Html::a('D', Url::to('@web/catalog/filter/d'))?></span>
                    <span class="btn btn-default"><?=Html::a('E', Url::to('@web/catalog/filter/e'))?></span>
                    <span class="btn btn-default"><?=Html::a('F', Url::to('@web/catalog/filter/f'))?></span>
                    <span class="btn btn-default"><?=Html::a('G', Url::to('@web/catalog/filter/g'))?></span>
                    <span class="btn btn-default"><?=Html::a('H', Url::to('@web/catalog/filter/h'))?></span>
                    <span class="btn btn-default"><?=Html::a('I', Url::to('@web/catalog/filter/i'))?></span>
                    <span class="btn btn-default"><?=Html::a('J', Url::to('@web/catalog/filter/j'))?></span>
                    <span class="btn btn-default"><?=Html::a('K', Url::to('@web/catalog/filter/k'))?></span>
                    <span class="btn btn-default"><?=Html::a('L', Url::to('@web/catalog/filter/l'))?></span>
                    <span class="btn btn-default"><?=Html::a('M', Url::to('@web/catalog/filter/m'))?></span>
                    <span class="btn btn-default"><?=Html::a('N', Url::to('@web/catalog/filter/n'))?></span>
                    <span class="btn btn-default"><?=Html::a('O', Url::to('@web/catalog/filter/o'))?></span>
                    <span class="btn btn-default"><?=Html::a('P', Url::to('@web/catalog/filter/p'))?></span>
                    <span class="btn btn-default"><?=Html::a('Q', Url::to('@web/catalog/filter/q'))?></span>
                    <span class="btn btn-default"><?=Html::a('R', Url::to('@web/catalog/filter/r'))?></span>
                    <span class="btn btn-default"><?=Html::a('S', Url::to('@web/catalog/filter/s'))?></span>
                    <span class="btn btn-default"><?=Html::a('T', Url::to('@web/catalog/filter/t'))?></span>
                    <span class="btn btn-default"><?=Html::a('U', Url::to('@web/catalog/filter/u'))?></span>
                    <span class="btn btn-default"><?=Html::a('V', Url::to('@web/catalog/filter/v'))?></span>
                    <span class="btn btn-default"><?=Html::a('W', Url::to('@web/catalog/filter/w'))?></span>
                    <span class="btn btn-default"><?=Html::a('X', Url::to('@web/catalog/filter/x'))?></span>
                    <span class="btn btn-default"><?=Html::a('Y', Url::to('@web/catalog/filter/y'))?></span>
                    <span class="btn btn-default"><?=Html::a('Z', Url::to('@web/catalog/filter/z'))?></span>
                    <span class="btn btn-default"><?=Html::a('ВСЕ', Url::to('@web/'))?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="catalog-container">
        <div class="catalog-caption">
            Для начала поиска выберите модель
        </div>
        <div class="container">
            <div class="row">
                <?foreach($model as $category):?>
                    <div class="col-lg-12">
                        <div class="category-block">
                            <?
                            if($category->photo != null){
                                echo Html::a(Html::img('@web/images/catalog/category/' . $category->photo, ['width' => 50 ]),
                                    Url::to('catalog/' . $category->alias));
                            }

                            else {
                                echo Html::a(Html::img('@web/images/not_found.jpg', ['width' => 50 ]),
                                    Url::to('catalog/' . $category->alias));
                            }

                            ?>

                            <?=Html::a($category->name, Url::to('catalog/' . $category->alias))  ;?>
                        </div>
                    </div>
                <?endforeach;?>
            </div>
        </div>
    </div>




</div>
