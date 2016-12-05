<?php

/* @var $this yii\web\View */
/* @var $alphabetCategory */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '"ДрайвМакс" - интернет магазин запчастей для иномарок.';


?>
<div class="site-index">



    <!--
    <div class="cat-menu">
        <div class="cat-menu-item">
            <div class="cat-menu-item-img-body">

            </div>
            <div class="cat-menu-item-text-active">
                Кузов и оптика
            </div>
        </div>

        <div class="cat-menu-item">
            <div class="cat-menu-item-img-glass">

            </div>
            <div class="cat-menu-item-text">
                Лобовые стекла
            </div>
        </div>

        <div class="cat-menu-item">
            <div class="cat-menu-item-img-radiator">

            </div>
            <div class="cat-menu-item-text">
                Радиаторы
            </div>
        </div>

        <div class="cat-menu-item">
            <div class="cat-menu-item-img-lamp">

            </div>
            <div class="cat-menu-item-text">
                Лампочки
            </div>
        </div>

        <div class="cat-menu-item">
            <div class="cat-menu-item-img-repair">

            </div>
            <div class="cat-menu-item-text">
                Ремонт стекол
            </div>
        </div>

        <div class="cat-menu-item">
            <div class="cat-menu-item-img-table">

            </div>
            <div class="cat-menu-item-text">
                Столики
            </div>
        </div>
    </div>
-->
    <div class="line"></div>

    <div class="alphabet-container">
        <div class="alphabet-caption">
            Фильтр по алфавиту:
        </div>
            <div class="alphabet-buttons">
                <?for($i='a'; $i<'z'; $i++):?>
                    <span><?=Html::a(strtoupper($i), Url::to('@web/catalog/filter/' . $i), ['class' =>  'btn btn-default'])?></span>
                <?endfor;?>
                <span><?=Html::a('Z', Url::to('@web/catalog/filter/z'), ['class' =>  'btn btn-default'])?></span>
                <span><?=Html::a('ВСЕ', Url::to('@web/'), ['class' =>  'btn btn-default'])?></span>
            </div>
    </div>
    <div class="catalog-container">
        <div class="catalog-caption">
            Для начала поиска выберите модель
        </div>
        <div class="catalog-entry">
            <?for($i=0; $i<count($alphabetCategory); $i++):?>
                <div class="col-lg-3">
                    <?foreach($alphabetCategory[$i] as $key => $category):?>
                        <div class="item-container">
                            <div class="item-letter"><?=strtoupper($key)?></div>
                            <div class="item-list">
                                <?for($y=0; $y<count($category); $y++):?>
                                    <ul>
                                        <li>
                                            <div class="item-photo">
                                                <?if(!$category[$y]->photo==null){
                                                    echo Html::a(Html::img('@web/images/catalog/category/'
                                                        . $category[$y]->photo, ['width' => 40 ]),
                                                        Url::to('catalog/' . $category[$y]->alias));
                                                } /*else echo Html::img('@web/images/not_found.jpg'
                                            . $category[$y]->photo, ['width' => 40]);
                                        */?>
                                            </div>
                                            <div class="item-name">
                                                <?=Html::a($category[$y]->name, Url::to('@web/catalog/'
                                                    . $category[$y]->alias)) ;?>
                                            </div>
                                        </li>
                                    </ul>
                                <?endfor?>
                            </div>
                        </div>
                    <?endforeach?>
                </div>
            <?endfor?>
        </div>


    </div>


</div>
